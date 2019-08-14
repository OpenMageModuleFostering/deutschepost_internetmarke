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
 * DeutschePost_ProdWs_Model_Gateway
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Gateway
{
    /**
     * @var DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface
     */
    protected $_adapter;

    public function __construct()
    {
        $client = new Zend_Soap_Client();
        $config = Mage::getModel('deutschepost_prodws/config');

        $adapter = Mage::getModel('deutschepost_prodws/webservice_adapter_soap', array(
            'client' => $client,
            'config' => $config,
        ));

        $this->setAdapter($adapter);
    }

    /**
     * @return DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * @param DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface $adapter
     * @return $this
     */
    public function setAdapter(DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface $adapter)
    {
        $this->_adapter = $adapter;
        return $this;
    }

    /**
     * Retrieve products and prices from product information interface.
     *
     * @return int Number of retrieved sales products.
     * @throws Exception
     */
    public function getProductVersionsList()
    {
        /** @var DeutschePost_ProdWs_Model_Webservice_Adapter_Soap $adapter */
        $adapter = $this->getAdapter();

        Mage::dispatchEvent('deutschepost_prodws_get_product_versions_list_before', array(
            'gateway' => $this,
        ));

        try {
            $collection = $adapter->getProductVersionsList();
            $collection->replace();

            DeutschePost_Internetmarke_Logger::logInfo($collection->toArray());
        } catch (Exception $e) {
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logRequest($adapter->getClient());
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logResponse($adapter->getClient());
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logFault($e);
            throw $e;
        }

        Mage::dispatchEvent('deutschepost_prodws_get_product_versions_list_after', array(
            'gateway' => $this,
            'product_list' => $collection,
        ));

        return count($collection);
    }
}
