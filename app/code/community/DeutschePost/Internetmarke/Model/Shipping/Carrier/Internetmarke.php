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
 * DeutschePost_Internetmarke_Model_Shipping_Carrier_Internetmarke
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Shipping_Carrier_Internetmarke
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    /**
     * Code of the carrier
     *
     * @var string
     */
    const CODE = 'dpim';

    /**
     * Code of the carrier
     *
     * @var string
     */
    protected $_code = self::CODE;

    /**
     * Let the system know about the label capabilities.
     *
     * @return bool
     */
    public function isShippingLabelsAvailable()
    {
        return true;
    }

    /**
     * Check if carrier has shipping tracking option available
     *
     * @return boolean
     */
    public function isTrackingAvailable()
    {
        return true;
    }

    /**
     * Return empty rate result as Internetmarke rates cannot be inferred from
     * catalog data. In particular, package dimensions are missing.
     *
     * Returning an empty rate result prevents the current carrier from being
     * listed during checkout.
     *
     * @see Mage_Shipping_Model_Shipping::collectCarrierRates()
     * @see Mage_Shipping_Model_Rate_Result::append()
     *
     * @param Mage_Shipping_Model_Rate_Request $rateRequest
     * @return Mage_Shipping_Model_Rate_Result|bool|null
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $rateRequest)
    {
        return Mage::getModel('shipping/rate_result');
    }

    /**
     * Get allowed shipping methods
     *
     * @return string[]
     */
    public function getAllowedMethods()
    {
        return Mage::getModel('deutschepost_internetmarke/config')->getAllowedMethods();
    }

    /**
     * Add one shipment order item to the shipping order queue.
     * Currently we do not fetch the label immediately.
     *
     * @param Mage_Shipping_Model_Shipment_Request $request
     * @return Varien_Object
     * @throws DeutschePost_Internetmarke_Exception
     */
    public function requestToShipment(Mage_Shipping_Model_Shipment_Request $request)
    {
        $response = new Varien_Object();
        $helper = Mage::helper('deutschepost_internetmarke/hub');

        // check if a DP product was selected during shipment creation
        $shipment = $request->getOrderShipment();
        if (!$shipment->getDpimProduct()) {
            $response->setErrors('No product selected for shipping order.');
            return $response;
        }

        if (!$shipment->getDpimService()) {
            $shipment->setDpimService(array());
        }

        // infer a sales product from the shipment request
        $shippingOrderItem = $helper->initShippingOrderItem($request);
        if (!$shippingOrderItem) {
            $msg = 'The requested product combination does not exist.';
            throw new DeutschePost_Internetmarke_Exception($helper->__($msg));
        }

//        fill response info if the label is fetched immediately:
//        $response->setInfo(array(
//            array(
//                'tracking_number' => null,
//                'label_content'   => null,
//            ),
//        ));

        // attach the sales product to the response for subsequent operations
        $response->setShippingOrderItem($shippingOrderItem);
        return $response;
    }

    /**
     * Fetch the current delivery status for the given tracking numbers.
     *
     * @param string[] $trackings
     * @return Mage_Shipping_Model_Tracking_Result
     */
    public function getTracking($trackings)
    {
        if (!is_array($trackings)) {
            $trackings = array($trackings);
        }

        $helper = Mage::helper('deutschepost_internetmarke/hub');

        $carrierCode = $this->getCarrierCode();
        $carrierTitle = Mage::getStoreConfig('carriers/'.$carrierCode.'/title', $this->getStore());

        $result = Mage::getModel('shipping/tracking_result');
        foreach ($trackings as $trackingNumber) {
            $status = Mage::getModel('shipping/tracking_result_status');
            $status->setData(array(
                'carrier' => $carrierCode,
                'carrier_title' => $carrierTitle,
                'tracking' => $trackingNumber,
                'status' => null,
                'service' => null,
                'delivery_date' => null,
                'delivery_time' => null,
                'delivery_location' => null,
                'signedby' => null,
                'popup' => true,
                'url' => $helper->getTrackingLink($trackingNumber),
                'tracksummary' => null,
            ));
            $result->append($status);
        }

        return $result;
    }

    /**
     * Obtain tracking information for a track id.
     *
     * @see Mage_Sales_Model_Order_Shipment_Track::getNumberDetail()
     * @see Mage_Usa_Model_Shipping_Carrier_Abstract::getTrackingInfo()
     * @param string $tracking
     * @return bool|Mage_Shipping_Model_Tracking_Result
     */
    public function getTrackingInfo($tracking)
    {
        $trackings = $this->getTracking($tracking)->getAllTrackings();
        if (!count($trackings)) {
            return false;
        }

        return $trackings[0];
    }
}
