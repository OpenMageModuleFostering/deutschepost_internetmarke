<?php
/**
 * DeutschePost ProdWs
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 5
 *
 * @category  DeutschePost
 * @package   DeutschePost_ProdWs
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_ProdWs_Model_Resource_Product_Sales_Collection
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Resource_Product_Sales_Collection
    extends DeutschePost_ProdWs_Model_Resource_Product_Collection_Abstract
{
    /**
     * Model initialization.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_prodws/product_sales');
    }

    /**
     * Obtain all sales products that are associated to the given basic
     * and additional products. Additional products may be omitted. Additional
     * products may be included in multiple sales products, e.g. "Einschreiben"
     * is available for
     * - Kompaktbrief Integral + EINSCHREIBEN
     * - Kompaktbrief Integral + EINSCHREIBEN + EIGENHÄNDIG
     *
     * @param int $basicProductId
     * @param int[] $additionalProductIds
     * @return $this
     */
    public function addProductCombinationFilter($basicProductId, array $additionalProductIds = array())
    {
        $this->addFieldToFilter('basicproduct_id', array('eq' => array($basicProductId)));

        if (empty($additionalProductIds)) {
            $this->getSelect()->joinLeft(
                array('psa' => $this->getTable('deutschepost_prodws/product_sales_additional')),
                'psa.salesproduct_id = main_table.salesproduct_id',
                'main_table.*'
            );
            $this->addFieldToFilter('psa.additionalproduct_id', array('null' => true));
        } else {
            foreach ($additionalProductIds as $additionalProductId) {
                $alias = sprintf("psa%d", $additionalProductId);
                $this->join(
                    array($alias => 'deutschepost_prodws/product_sales_additional'),
                    "$alias.salesproduct_id = main_table.salesproduct_id",
                    'main_table.*'
                );
                $this->addFieldToFilter("$alias.additionalproduct_id", array('eq' => array($additionalProductId)));
            }
        }
    }

    /**
     * Fetch all available product combinations
     *
     * @param boolean $onlyAvailable Filter for currently available products.
     * @return array
     */
    public function getProductCombinations($onlyAvailable = true)
    {
        $this->_reset();
        $combinations = array();

        if ($onlyAvailable) {
            $this->addDateFilter();
        }

        $this->getSelect()->reset(Varien_Db_Select::COLUMNS);
        $this->join(
            array('psa' => 'deutschepost_prodws/product_sales_additional'),
            'psa.salesproduct_id = main_table.salesproduct_id',
            array('main_table.salesproduct_id', 'main_table.basicproduct_id', 'psa.additionalproduct_id')
        );

        foreach ($this->getData() as $row) {
            if (!isset($combinations[$row['salesproduct_id']])) {
                $combinations[$row['salesproduct_id']] = array(
                    'product' => $row['basicproduct_id'],
                    'services' => array($row['additionalproduct_id']),
                );
            } else {
                $combinations[$row['salesproduct_id']]['services'][]= $row['additionalproduct_id'];
            }
        }

        return $combinations;
    }

    /**
     * Clean up all products and replace them with the current collection contents.
     * FK constraints clean up related tables
     *
     * @return $this
     * @throws Exception
     */
    public function replace()
    {
        $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
        try {
            $connection->beginTransaction();

            $connection->delete($this->getTable('deutschepost_prodws/product_basic'));
            $connection->delete($this->getTable('deutschepost_prodws/product_additional'));
            $this->save();

            $connection->commit();
        } catch (Exception $e) {
            $connection->rollBack();
            throw $e;
        }

        return $this;
    }
}
