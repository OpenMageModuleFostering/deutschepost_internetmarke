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
 * DeutschePost_Internetmarke_Model_Franking_Interface
 *
 * In order to request a shipping label for a shipment, a shipment order is
 * placed at a 3PL service. This interface represents one order item.
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface DeutschePost_Internetmarke_Model_Franking_Interface
{
    /**
     * Obtain status of the shipping order.
     * @return int
     */
    public function getStatus();

    /**
     * Set status of the shipping order.
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Obtain the shipment associated to the shipping order.
     * @return Mage_Sales_Model_Order_Shipment
     */
    public function getShipment();

    /**
     * Set the shipment associated to the shipping order.
     * @param Mage_Sales_Model_Order_Shipment $shipment
     * @return $this
     */
    public function setShipment(Mage_Sales_Model_Order_Shipment $shipment);
}
