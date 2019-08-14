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
 * DeutschePost_Internetmarke_Helper_Order
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Helper_Order
    implements DeutschePost_Internetmarke_Helper_Order_Interface
{
    /**
     * @param DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
     * @return DeutschePost_Internetmarke_Model_Franking_Interface
     */
    public function persistShippingOrderItem(
        DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
    )
    {
        return null;
    }

    /**
     * Build a tracking link based on the given track id.
     *
     * @param string $trackingNumber
     * @return string Empty string if track id was not found, tracking link otherwise.
     */
    public function getTrackingLink($trackingNumber)
    {
        return '';
    }
}
