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
 * DeutschePost_Internetmarke_Helper_Hub
 *
 * This helper serves as a dispatcher to the webservice modules.
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Helper_Hub
    extends Mage_Core_Helper_Abstract
{
    /**
     * @var DeutschePost_Internetmarke_Helper_Product_Interface
     */
    protected $_productHelper;

    /**
     * @var DeutschePost_Internetmarke_Helper_Order_Interface
     */
    protected $_orderHelper;

    public function __construct()
    {
        $config = Mage::getModel('deutschepost_internetmarke/config');
        $this->_productHelper = $config->getProductHelper();
        $this->_orderHelper = $config->getOrderHelper();
    }

    /**
     * Query product names by PPL and Source ID combination.
     *
     * @param int $pplId
     * @param string[] $productCodes
     * @return string[]
     */
    public function getProductNames($pplId, $productCodes)
    {
        return $this->_productHelper->getProductNames($pplId, $productCodes);
    }

    /**
     * Obtain a list of currently available products.
     *
     * @param string $countryCode
     * @return DeutschePost_Internetmarke_Model_Product[]
     */
    public function getAvailableProducts($countryCode)
    {
        return $this->_productHelper->getAvailableProducts($countryCode);
    }

    /**
     * Obtain a list of currently available services.
     *
     * @param string $countryCode
     * @return DeutschePost_Internetmarke_Model_Service[]
     */
    public function getAvailableServices($countryCode)
    {
        return $this->_productHelper->getAvailableServices($countryCode);
    }

    /**
     * Obtain the appropriate sales product as specified by the given shipment request.
     *
     * @param Mage_Shipping_Model_Shipment_Request $request
     * @return DeutschePost_Internetmarke_Model_Shipping_Order_Item|null
     */
    public function initShippingOrderItem(Mage_Shipping_Model_Shipment_Request $request)
    {
        $shipment = $request->getOrderShipment();

        $productId       = $shipment->getDpimProduct();
        $serviceIds      = $shipment->getDpimService();
        $deliveryCountry = $shipment->getShippingAddress()->getCountryId();
        $orderDate       = $shipment->getCreatedAtDate();

        $shippingOrderItem = $this->_productHelper->initShippingOrderItem(
            $productId,
            $serviceIds,
            $deliveryCountry,
            $orderDate
        );

        if ($shippingOrderItem) {
            $shippingOrderItem->setShipmentId($shipment->getId());
        }

        return $shippingOrderItem;
    }

    /**
     * Persist the shipping order item.
     *
     * @param DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
     * @return DeutschePost_Internetmarke_Model_Franking_Interface
     * @throws Exception
     */
    public function persistShippingOrderItem(
        DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
    ) {
        return $this->_orderHelper->persistShippingOrderItem($item);
    }

    /**
     * Build a tracking link based on the given track id.
     *
     * @param string $trackingNumber
     * @return string
     */
    public function getTrackingLink($trackingNumber)
    {
        return $this->_orderHelper->getTrackingLink($trackingNumber);
    }
}
