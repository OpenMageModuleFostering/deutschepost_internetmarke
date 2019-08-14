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
 * DeutschePost_OneClickForApp_Model_Resource_Franking_Collection
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Resource_Franking_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Model initialization.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_oneclickforapp/franking');
    }

    /**
     * Add filter for given shipment.
     *
     * @param int|Mage_Sales_Model_Order_Shipment $shipment
     * @return $this
     */
    public function addShipmentFilter($shipment)
    {
        if ($shipment instanceof Mage_Sales_Model_Order_Shipment) {
            $shipment = $shipment->getId();
        }

        if (!is_numeric($shipment)) {
            $shipment = 0;
        }

        $this->addFieldToFilter('shipment_id', array('eq' => $shipment));

        return $this;
    }

    /**
     * Load (filtered) collection and set the corresponding shipment to every item.
     *
     * @return $this
     */
    public function addShipments()
    {
        $shipmentIds = $this->getColumnValues('shipment_id');
        $shipmentCollection = Mage::getModel('sales/order_shipment')->getCollection();
        $shipmentCollection->addFieldToFilter('entity_id', array('in' => $shipmentIds));
        $shipments = $shipmentCollection->getItems();

        /** @var DeutschePost_OneClickForApp_Model_Franking $franking */
        foreach ($this->getItems() as $franking) {
            if (isset($shipments[$franking->getShipmentId()])) {
                $franking->setShipment($shipments[$franking->getShipmentId()]);
            }
        }

        return $this;
    }

    public function joinShipmentData()
    {
        $this->join('sales/shipment', 'shipment_id = entity_id', array(
            'increment_id',
        ));
        return $this;
    }
}
