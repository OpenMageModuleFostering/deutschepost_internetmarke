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
 * DeutschePost_ProdWs_Helper_Data
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Helper_Data extends Mage_Core_Helper_Abstract
    implements DeutschePost_Internetmarke_Helper_Product_Interface
{
    /** @var DeutschePost_Internetmarke_Model_Product[] */
    protected $availableProducts = array();

    /** @var DeutschePost_Internetmarke_Model_Service[] */
    protected $availableServices = array();

    /**
     * Obtain destination identifier by given country code.
     *
     * @param string $countryCode ISO-2 Country Code
     * @return string
     */
    public function getDestinationByCountryCode($countryCode)
    {
        $destination = DeutschePost_ProdWs_Model_Product_Basic::DESTINATION_NATIONAL;
        if ($countryCode != 'DE') {
            $destination = DeutschePost_ProdWs_Model_Product_Basic::DESTINATION_INTERNATIONAL;
        }

        return $destination;
    }

    /**
     * @param int $pplId
     * @param string[] $productCodes
     * @return string[]
     */
    public function getProductNames($pplId, $productCodes)
    {
        if (!is_array($productCodes)) {
            $productCodes = array($productCodes);
        }

        $spCollection = Mage::getModel('deutschepost_prodws/product_sales')
            ->getCollection();

        $spCollection->addFieldToFilter('ppl_id', array('eq' => $pplId));
        $spCollection->addFieldToFilter('source_id', array('in' => $productCodes));

        return $spCollection->getColumnValues('name');
    }

    /**
     * Obtain a list of currently available products.
     *
     * @param string $countryCode
     *
     * @return DeutschePost_Internetmarke_Model_Product[]
     */
    public function getAvailableProducts($countryCode)
    {
        if (!isset($this->availableProducts[$countryCode])) {
            $products    = array();
            $destination = $this->getDestinationByCountryCode($countryCode);

            $collection = Mage::getModel('deutschepost_prodws/product_basic')->getCollection();
            $collection->addDateFilter();
            $collection->addDestinationFilter($destination);
            $collection->setOrder('name', Varien_Data_Collection::SORT_ORDER_ASC);

            $productCombinations = Mage::getModel('deutschepost_prodws/product_sales')
                ->getCollection()
                ->addDateFilter()
                ->getProductCombinations();

            foreach ($collection as $basicProduct) {
                $args = array(
                    'id'       => $basicProduct->getId(),
                    'name'     => $basicProduct->getName(),
                    'price'    => $basicProduct->getPrice(),
                    'services' => array()
                );

                foreach ($productCombinations as $productCombination) {
                    if ($productCombination['product'] == $basicProduct->getId()) {
                        $args['services'][] = $productCombination['services'];
                    }
                }

                $products[] = Mage::getModel('deutschepost_internetmarke/product', $args);
            }

            $this->availableProducts[$countryCode] = $products;
        }

        return $this->availableProducts[$countryCode];
    }

    /**
     * Obtain a list of currently available services.
     *
     * @param string $countryCode
     *
     * @return DeutschePost_Internetmarke_Model_Service[]
     */
    public function getAvailableServices($countryCode)
    {
        if (!isset($this->availableServices[$countryCode])) {
            $services    = array();
            $destination = $this->getDestinationByCountryCode($countryCode);

            $collection = Mage::getModel('deutschepost_prodws/product_additional')->getCollection();
            $collection->addDateFilter();
            $collection->addDestinationFilter($destination);

            foreach ($collection as $additionalProduct) {
                $service    = Mage::getModel('deutschepost_internetmarke/service',
                    array(
                        'id'   => $additionalProduct->getId(),
                        'name' => $additionalProduct->getName(),
                        'price' => $additionalProduct->getPrice()
                    )
                );
                $services[] = $service;
            }

            $this->availableServices[$countryCode] = $services;
        }

        return $this->availableServices[$countryCode];
    }

    /**
     * Obtain a sales product as specified by the given parameters.
     *
     * @param int $productId Basic Product ID
     * @param int[] $serviceIds Additional Product IDs
     * @param string $countryCode ISO-2 Country Code
     * @param string $date Shipment Date
     * @return DeutschePost_Internetmarke_Model_Shipping_Order_Item|null
     */
    public function initShippingOrderItem($productId, array $serviceIds,
        $countryCode, $date = null
    ) {
        $salesProduct = Mage::getModel('deutschepost_prodws/product_sales');
        /** @var DeutschePost_ProdWs_Model_Resource_Product_Sales $resourceModel */
        $resourceModel = $salesProduct->getResource();

        $destination = $this->getDestinationByCountryCode($countryCode);
        $resourceModel->loadByAssociations(
            $salesProduct, $productId, $serviceIds, $destination, $date
        );

        if ($salesProduct->isObjectNew()) {
            // no sales product loaded
            return null;
        }

        $shippingOrderItem = Mage::getModel('deutschepost_internetmarke/shipping_order_item');
        $shippingOrderItem->setProductCode($salesProduct->getSourceId());
        $shippingOrderItem->setPrice($salesProduct->getPrice());
        $shippingOrderItem->setPplId($salesProduct->getPplId());

        return $shippingOrderItem;
    }
}
