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
 * DeutschePost_Internetmarke_Helper_Product
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Helper_Product
    implements DeutschePost_Internetmarke_Helper_Product_Interface
{
    /**
     * @param int $pplId
     * @param string[] $productCodes
     * @return string[]
     */
    public function getProductNames($pplId, $productCodes)
    {
        return array();
    }

    /**
     * Obtain a list of currently available products.
     *
     * @param string $countryCode
     * @return DeutschePost_Internetmarke_Model_Product[]
     */
    public function getAvailableProducts($countryCode)
    {
        return array();
    }

    /**
     * Obtain a list of currently available services.
     *
     * @param string $countryCode
     * @return DeutschePost_Internetmarke_Model_Service[]
     */
    public function getAvailableServices($countryCode)
    {
        return array();
    }

    /**
     * @param int $productId Basic Product ID
     * @param int[] $serviceIds Additional Product IDs
     * @param string $countryCode ISO-2 Country Code
     * @param string $date Shipment Date
     * @return DeutschePost_Internetmarke_Model_Shipping_Order_Item|null
     */
    public function initShippingOrderItem(
        $productId, array $serviceIds, $countryCode, $date = null
    )
    {
        return null;
    }
}
