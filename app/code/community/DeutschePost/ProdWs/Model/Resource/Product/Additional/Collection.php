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
 * DeutschePost_ProdWs_Model_Resource_Product_Additional_Collection
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Resource_Product_Additional_Collection
    extends DeutschePost_ProdWs_Model_Resource_Product_Collection_Abstract
{
    /**
     * Model initialization.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_prodws/product_additional');
    }

    /**
     * @param DeutschePost_ProdWs_Model_Product_Sales $salesProduct
     * @return $this
     */
    public function addSalesProductFilter(DeutschePost_ProdWs_Model_Product_Sales $salesProduct)
    {
        $this->join(
            array('psa' => 'deutschepost_prodws/product_sales_additional'),
            'psa.additionalproduct_id = main_table.additionalproduct_id',
            'main_table.*'
        );
        $this->addFieldToFilter('psa.salesproduct_id', array('eq' => $salesProduct->getId()));

        return $this;
    }
}
