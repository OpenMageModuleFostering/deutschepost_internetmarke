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
 * DeutschePost_OneClickForApp_Model_Franking
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @method string getShopOrderId()
 * @method DeutschePost_OneClickForApp_Model_Franking setShopOrderId() setShopOrderId(string $shopOrderId)
 * @method int getShipmentId()
 * @method DeutschePost_OneClickForApp_Model_Franking setShipmentId() setShipmentId(int $shipmentId)
 * @method int getPosition()
 * @method DeutschePost_OneClickForApp_Model_Franking setPosition() setPosition(int $position)
 * @method string getProductCode()
 * @method DeutschePost_OneClickForApp_Model_Franking setProductCode() setProductCode(string $productCode)
 * @method string getVoucherId()
 * @method DeutschePost_OneClickForApp_Model_Franking setVoucherId() setVoucherId(string $voucherId)
 * @method string getTrackId()
 * @method DeutschePost_OneClickForApp_Model_Franking setTrackId() setTrackId(string $trackId)
 * @method int getPplId()
 * @method DeutschePost_OneClickForApp_Model_Franking setPplId() setPplId(int $pplId)
 * @method int getRowTotal()
 * @method DeutschePost_OneClickForApp_Model_Franking setRowTotal() setRowTotal(int $total)
 * @method string getLink()
 * @method DeutschePost_OneClickForApp_Model_Franking setLink() setLink(string $link)
 * @method string getCreatedAt()
 * @method DeutschePost_OneClickForApp_Model_Franking setCreatedAt() setCreatedAt(string $created_at)
 * @method string getUpdatedAt()
 * @method DeutschePost_OneClickForApp_Model_Franking setUpdatedAt() setUpdatedAt(string $updated_at)
 */
class DeutschePost_OneClickForApp_Model_Franking
    extends Mage_Core_Model_Abstract
    implements DeutschePost_Internetmarke_Model_Franking_Interface
{
    const STATUS_ORDER_PENDING = 0;
    const STATUS_ORDER_PLACED = 1;

    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_oneclickforapp/franking');
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->getData('status');
    }

    /**
     * Set current order status.
     *
     * @param int $status
     * @return $this
     * @throws DeutschePost_OneClickForApp_Exception
     */
    public function setStatus($status)
    {
        if (!in_array($status, array(self::STATUS_ORDER_PENDING, self::STATUS_ORDER_PLACED))) {
            throw new DeutschePost_OneClickForApp_Exception("Not a valid order status: '$status'");
        }

        $this->setData('status', $status);
        return $this;
    }

    /**
     * Obtain shipment for the DP Internetmarke order item.
     *
     * @return Mage_Sales_Model_Order_Shipment
     */
    public function getShipment()
    {
        $shipmentId = $this->getShipmentId();
        if (!$shipmentId) {
            return null;
        }

        if (!$this->hasData('shipment')) {
            $shipment = Mage::getModel('sales/order_shipment');
            $shipment->load($shipmentId);
            $this->setShipment($shipment);
        }

        return $this->getData('shipment');
    }

    /**
     * Set shipment to DP Internetmarke order item.
     *
     * @param Mage_Sales_Model_Order_Shipment $shipment
     * @return $this
     */
    public function setShipment(Mage_Sales_Model_Order_Shipment $shipment)
    {
        $this->setShipmentId($shipment->getId());
        $this->setData('shipment', $shipment);

        return $this;
    }

    /**
     * Save the shipment if one is assigned and loaded.
     *
     * @return $this
     * @throws Exception
     */
    protected function _afterSave()
    {
        parent::_afterSave();

        if ($this->hasData('shipment')) {
            $this->getShipment()->save();
        }

        return $this;
    }
}
