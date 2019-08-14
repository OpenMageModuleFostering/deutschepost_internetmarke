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
 * DeutschePost_ProdWs_Model_Resource_Product_Sales
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Resource_Product_Sales
    extends DeutschePost_ProdWs_Model_Resource_Product_Abstract
{
    /**
     * Main table unique keys field names.
     * @see Mage_Core_Model_Resource_Db_Abstract::$_uniqueFields
     *
     * @var array
     */
    protected $_uniqueFields = array(array(
        'field' => array('source_id', 'prodws_id', 'ppl_id'),
        'title' => 'The ProdWS ID and Source System ID must be unique per PPL.',
    ));

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('deutschepost_prodws/product_sales', 'salesproduct_id');
    }

    /**
     * Get sales products to which specified item is assigned
     *
     * @param int $spId
     * @return int[]
     */
    public function lookupAdditionalProductIds($spId)
    {
        $adapter = $this->_getReadAdapter();

        $select  = $adapter->select()
            ->from($this->getTable('deutschepost_prodws/product_sales_additional'), 'additionalproduct_id')
            ->where('salesproduct_id = ?', (int)$spId);

        return $adapter->fetchCol($select);
    }

    /**
     * Set additional product ids if available
     *
     * @param Mage_Core_Model_Abstract $object
     * @return Mage_Cms_Model_Resource_Page
     */
    protected function _afterLoad(Mage_Core_Model_Abstract $object)
    {
        /** @var DeutschePost_ProdWs_Model_Product_Sales $object */
        if ($object->getId()) {
            $apIds = $this->lookupAdditionalProductIds($object->getId());
            $object->setAdditionalproductIds($apIds);
        }

        return parent::_afterLoad($object);
    }

    /**
     * Assign basic product to sales product
     *
     * @param Mage_Core_Model_Abstract $object
     * @return $this
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        /** @var DeutschePost_ProdWs_Model_Product_Sales $object */
        $object->setBasicproductId($object->getBasicProduct()->getId());
        return parent::_beforeSave($object);
    }

    /**
     * Assign additional products to sales product
     *
     * @param Mage_Core_Model_Abstract $object
     * @return $this
     */
    protected function _afterSave(Mage_Core_Model_Abstract $object)
    {
        /** @var DeutschePost_ProdWs_Model_Product_Sales $object */
        $oldApIds = $this->lookupAdditionalProductIds($object->getId());

        $newApIds = array();
        $newAps = (array)$object->getAdditionalProducts();
        /** @var DeutschePost_ProdWs_Model_Product_Additional $additionalProduct */
        foreach ($newAps as $additionalProduct) {
            $newApIds[]= $additionalProduct->getId();
        }

        $table  = $this->getTable('deutschepost_prodws/product_sales_additional');
        $insert = array_diff($newApIds, $oldApIds);
        $delete = array_diff($oldApIds, $newApIds);

        if ($delete) {
            $where = array(
                'salesproduct_id = ?' => (int) $object->getId(),
                'additionalproduct_id IN (?)' => $delete
            );

            $this->_getWriteAdapter()->delete($table, $where);
        }

        if ($insert) {
            $data = array();

            foreach ($insert as $apId) {
                $data[] = array(
                    'salesproduct_id' => (int) $object->getId(),
                    'additionalproduct_id' => (int) $apId
                );
            }

            $this->_getWriteAdapter()->insertMultiple($table, $data);
        }

        $object->setAdditionalproductIds($newApIds);
        return parent::_afterSave($object);
    }

    /**
     * Load a sales product by given product associations.
     * As opposed to the resource collection, this will load an exact match.
     *
     * @see DeutschePost_ProdWs_Model_Resource_Product_Sales_Collection::addProductCombinationFilter()
     * @param DeutschePost_ProdWs_Model_Product_Sales $salesProduct
     * @param int $basicProductId
     * @param int[] $additionalProductIds
     * @param string $destination
     * @param string $date
     * @return Mage_Core_Model_Resource_Db_Abstract
     */
    public function loadByAssociations(
        DeutschePost_ProdWs_Model_Product_Sales $salesProduct, $basicProductId,
        array $additionalProductIds = array(),
        $destination = DeutschePost_ProdWs_Model_Product_Abstract::DESTINATION_NATIONAL,
        $date = null
    ) {
        $collection = $salesProduct->getCollection();
        $collection->addDestinationFilter($destination);
        $collection->addDateFilter($date);
        $collection->addProductCombinationFilter($basicProductId, $additionalProductIds);

        $salesProductId = null;
        /** @var DeutschePost_ProdWs_Model_Product_Sales $item */
        foreach ($collection as $item) {
            $item->afterLoad();
            $itemAdditionalProductIds = $item->getAdditionalproductIds();
            $diff = array_diff($itemAdditionalProductIds, $additionalProductIds);
            if (!count($diff)) {
                $salesProductId = $item->getId();
                break;
            }
        }

        return $this->load($salesProduct, $salesProductId);
    }
}
