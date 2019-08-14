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
 * DeutschePost_Internetmarke_Block_Adminhtml_Sales_Order_Shipment_Create_Dpim
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Block_Adminhtml_Sales_Order_Shipment_Create_Dpim
    extends Mage_Adminhtml_Block_Template
{
    /**
     * Retrieve invoice order
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        $shipment = $this->getShipment();
        if (!$shipment) {
            return null;
        }

        return $shipment->getOrder();
    }

    /**
     * Retrieve shipment model instance
     *
     * @return Mage_Sales_Model_Order_Shipment|null
     */
    public function getShipment()
    {
        return Mage::registry('current_shipment');
    }

    /**
     * Check if Internetmarke is applicable for the current shipment.
     *
     * @return bool
     */
    public function isAvailableForShipment()
    {
        return true;
    }

    /**
     * Check if product selection / franking settings should be displayed for
     * the current shipment.
     *
     * Block should not be displayed if DPIM is disabled via config or the
     * current carrier already provides shipping labels on its own.
     *
     * @return bool
     */
    public function canDisplayFranking()
    {
        $shippingCarrier        = $this->getOrder()->getShippingCarrier();
        $carrierLabelsAvailable = $shippingCarrier && $shippingCarrier->isShippingLabelsAvailable();

        $config     = Mage::getModel('deutschepost_internetmarke/config');
        $dpimActive = $config->isActive($this->getOrder()->getStoreId());

        return ($dpimActive && !$carrierLabelsAvailable);
    }

    /**
     * Obtain a list of available products.
     *
     * @param bool $withEmpty
     *
     * @return string[]
     */
    public function getProductOptions($withEmpty = false)
    {
        $options = array();
        if ($withEmpty) {
            $options[0] = '';
        }

        $destinationCountry = $this->getOrder()->getShippingAddress()->getCountryId();
        $products           = $this->helper('deutschepost_internetmarke/hub')
            ->getAvailableProducts($destinationCountry);
        /** @var DeutschePost_Internetmarke_Model_Product $product */
        foreach ($products as $product) {
            $options[$product->id] = $product->name;
        }

        return $options;
    }

    /**
     * Obtain a list of available services.
     *
     * @param bool $withEmpty
     *
     * @return string[]
     */
    public function getServiceOptions($withEmpty = false)
    {
        $options = array();
        if ($withEmpty) {
            $options[0] = '';
        }

        $destinationCountry = $this->getOrder()->getShippingAddress()->getCountryId();
        $services = $this->helper('deutschepost_internetmarke/hub')->getAvailableServices($destinationCountry);
        /** @var DeutschePost_Internetmarke_Model_Service $service */
        foreach ($services as $service) {
            $options[$service->id] = $service->name;
        }

        return $options;
    }

    /**
     * Obtain a map of product and service prices.
     *
     * @return array
     */
    public function getOptionPrices()
    {
        $prices = array();
        $destinationCountry = $this->getOrder()->getShippingAddress()->getCountryId();
        $products = $this->helper('deutschepost_internetmarke/hub')->getAvailableProducts($destinationCountry);
        $services = $this->helper('deutschepost_internetmarke/hub')->getAvailableServices($destinationCountry);
        /** @var DeutschePost_Internetmarke_Model_Product $product */
        foreach ($products as $product) {
            $prices['products'][$product->id] = $product->price;
        }
        /** @var DeutschePost_Internetmarke_Model_Service $service */
        foreach ($services as $service) {
            $prices['services'][$service->id] = $service->price;
        }

        return $prices;
    }

    /**
     * Obtain a map of product to service associations.
     *
     * @return array
     */
    public function getProductAssociations()
    {
        $associations = array();
        $destinationCountry = $this->getOrder()->getShippingAddress()->getCountryId();
        $products = $this->helper('deutschepost_internetmarke/hub')->getAvailableProducts($destinationCountry);
        /** @var DeutschePost_Internetmarke_Model_Product $product */
        foreach ($products as $product) {
            $associations[$product->id] = $product->services;
        }

        return $associations;
    }

    /**
     * Check if block should output HTML.
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->canDisplayFranking()) {
            return '';
        }

        return parent::_toHtml();
    }
}
