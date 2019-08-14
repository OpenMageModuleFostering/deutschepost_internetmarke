<?php
/**
 * DeutschePost OneClickForApp
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
 * @package   DeutschePost_OneClickForApp
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_OneClickForApp_Model_Gateway
 *
 * Central place to initiate web service requests, Currently these are SOAP calls.
 *
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Gateway
{
    /**
     * @var DeutschePost_Internetmarke_Model_Webservice_Adapter_Order_Interface
     */
    protected $_adapter;

    public function __construct()
    {
        $client = new Zend_Soap_Client();
        $config = Mage::getModel('deutschepost_oneclickforapp/config');

        $adapter = Mage::getModel('deutschepost_oneclickforapp/webservice_adapter_soap', array(
            'client' => $client,
            'config' => $config,
        ));

        $this->setAdapter($adapter);
    }

    /**
     * @return DeutschePost_Internetmarke_Model_Webservice_Adapter_Order_Interface
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * @param DeutschePost_Internetmarke_Model_Webservice_Adapter_Order_Interface $adapter
     * @return $this
     */
    public function setAdapter(DeutschePost_Internetmarke_Model_Webservice_Adapter_Order_Interface $adapter)
    {
        $this->_adapter = $adapter;
        return $this;
    }

    /**
     * Obtain all order items (frankings) ready for interface submission,
     * optionally filtered by certain IDs.
     *
     * @param int[] $frankingIds
     * @return DeutschePost_OneClickForApp_Model_Resource_Franking_Collection
     */
    protected function _prepareOrderItemsCollection($frankingIds = array())
    {
        $collection = Mage::getModel('deutschepost_oneclickforapp/franking')
            ->getCollection();
        $collection->addFieldToFilter('status', array(
            'eq' => DeutschePost_OneClickForApp_Model_Franking::STATUS_ORDER_PENDING
        ));
        if (count($frankingIds)) {
            $collection->addFieldToFilter('internetmarke_id', array('in' => $frankingIds));
        }
        $collection->addShipments();

        return $collection;
    }

    /**
     * @return int Number of retrieved page formats.
     * @throws Exception
     */
    public function retrievePageFormats()
    {
        $itemCount = 0;

        /** @var DeutschePost_OneClickForApp_Model_Webservice_Adapter_Soap $adapter */
        $adapter = $this->getAdapter();

        Mage::dispatchEvent('deutschepost_oneclickforapp_retrieve_page_formats_before', array(
            'gateway' => $this,
        ));

        try {
            $pageFormatCollection = $adapter->retrievePageFormats();
            $pageFormatCollection->replace();
            $itemCount = count($pageFormatCollection);

            Mage::getConfig()->deleteConfig(DeutschePost_OneClickForApp_Model_Config::CONFIG_XML_PATH_PAGE_FORMAT);
            Mage::getConfig()->reinit();

            DeutschePost_Internetmarke_Logger::logInfo($pageFormatCollection->toArray());
        } catch (Exception $e) {
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logRequest($adapter->getClient());
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logResponse($adapter->getClient());
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logFault($e);
            throw $e;
        }

        Mage::dispatchEvent('deutschepost_oneclickforapp_retrieve_page_formats_after', array(
            'gateway' => $this,
            'page_formats' => $pageFormatCollection,
        ));

        return $itemCount;
    }

    /**
     * Send order items to the API and obtain a link to the shipping labels.
     * This methods applies locking in order to avoid multiple submission of the same item.
     *
     * @see DeutschePost_Internetmarke_Model_Lock::setLock()
     * @param int[] $frankingIds Optionally limit the submission to certain order items
     * @return int Number of submitted shipping order items.
     * @throws Exception
     */
    public function checkoutShoppingCartPDF($frankingIds = array())
    {
        $itemCount = 0;

        /** @var DeutschePost_OneClickForApp_Model_Webservice_Adapter_Soap $adapter */
        $adapter = $this->getAdapter();

        $lock = DeutschePost_Internetmarke_Model_Lock::getInstance();
        $lockName = sprintf('deutschepost_%s', __FUNCTION__);

        if ($lock->setLock($lockName)) {
            try {
                $collection = $this->_prepareOrderItemsCollection($frankingIds);

                if (count($collection)) {
                    Mage::dispatchEvent('deutschepost_oneclickforapp_checkout_cart_before', array(
                        'gateway' => $this,
                        'order_items' => $collection,
                    ));

                    $walletBalance = $adapter->checkoutShoppingCartPDF($collection);
                    $collection->save();
                    $itemCount = count($collection);

                    $msg = sprintf("A new order with %d cart items was submitted to the order interface.", $itemCount);
                    DeutschePost_Internetmarke_Logger::logInfo($msg);

                    Mage::dispatchEvent('deutschepost_oneclickforapp_checkout_cart_after', array(
                        'gateway' => $this,
                        'order_items' => $collection,
                        'wallet_balance' => $walletBalance,
                    ));
                }

            } catch (Exception $e) {
                $lock->releaseLock($lockName);

                DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logRequest($adapter->getClient());
                DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logResponse($adapter->getClient());
                DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logFault($e);
                throw $e;
            }

            $lock->releaseLock($lockName);
        }

        return $itemCount;
    }
}
