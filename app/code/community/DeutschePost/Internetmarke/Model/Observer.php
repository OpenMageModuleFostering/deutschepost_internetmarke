<?php
/**
 * DeutschePost Internetmarke
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
 * @package   DeutschePost_Internetmarke
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_Internetmarke_Model_Observer
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Observer
{
    /**
     * Append Internetmarke product selection to Shipping Information box.
     * - event: core_block_abstract_to_html_after
     *
     * @param Varien_Event_Observer $observer
     */
    public function addShippingOrderSettings(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();
        if (!$block instanceof Mage_Adminhtml_Block_Sales_Order_Shipment_Create_Tracking) {
            return;
        }

        $transportObject = $observer->getTransport();
        $html = $transportObject->getHtml();
        $html.= $block->getChildHtml('deutschepost_internetmarke_create_dpim');

        $transportObject->setHtml($html);
    }

    /**
     * Prepare a shipping order for the shipment based on editForm data.
     * - event: core_copy_fieldset_sales_convert_order_to_shipment
     *
     * @param Varien_Event_Observer $observer
     */
    public function initShippingOrder(Varien_Event_Observer $observer)
    {
        $request = Mage::app()->getRequest();
        if (!$request->isPost()) {
            return;
        }

        $shipmentData = $request->getPost('shipment');
        if (!$shipmentData || !isset($shipmentData['dpim'])) {
            return;
        }

        if (!isset($shipmentData['dpim']['order']) || $shipmentData['dpim']['order'] != '1') {
            return;
        }

        /** @var Mage_Sales_Model_Order $order */
        $order = $observer->getSource();
        $carrier = Mage::getModel('deutschepost_internetmarke/shipping_carrier_internetmarke');
        $order->setShippingCarrier($carrier);

        /** @var Mage_Sales_Model_Order_Shipment $shipment */
        $shipment = $observer->getTarget();

        if (isset($shipmentData['dpim']['product'])) {
            $productId = $shipmentData['dpim']['product'];
            $shipment->setDpimProduct($productId);
        }
        if (isset($shipmentData['dpim']['service'])) {
            $serviceIds = explode('_', $shipmentData['dpim']['service']);
            $shipment->setDpimService($serviceIds);
        }
    }

    /**
     * Persist shipping order.
     * - event: sales_order_shipment_save_after
     *
     * @see DeutschePost_Internetmarke_Model_Shipping_Carrier_Internetmarke::requestToShipment()
     * @param Varien_Event_Observer $observer
     */
    public function createShippingOrder(Varien_Event_Observer $observer)
    {
        /** @var Mage_Sales_Model_Order_Shipment $shipment */
        $shipment = $observer->getShipment();

        $carrier = $shipment->getOrder()->getShippingCarrier();
        if (!$carrier instanceof DeutschePost_Internetmarke_Model_Shipping_Carrier_Internetmarke) {
            return;
        }

        $response = Mage::getModel('shipping/shipping')->requestToShipment($shipment);
        if ($response->hasErrors()) {
            $msg = Mage::helper('deutschepost_internetmarke/data')->__($response->getErrors());
            Mage::getSingleton('adminhtml/session')->addError($msg);
            return;
        }

        if (!$response->hasShippingOrderItem()) {
            return;
        }

        $helper = Mage::helper('deutschepost_internetmarke/hub');
        try {
            $helper->persistShippingOrderItem($response->getShippingOrderItem());
        } catch (Exception $e) {
            $message = 'The Deutsche Post INTERNETMARKE order could not be created.';
            Mage::getSingleton('adminhtml/session')->addError($helper->__($message));
            Mage::logException($e);
        }
    }
}
