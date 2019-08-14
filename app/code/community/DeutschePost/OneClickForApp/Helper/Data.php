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
 * DeutschePost_OneClickForApp_Helper_Data
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Helper_Data extends Mage_Core_Helper_Abstract
    implements DeutschePost_Internetmarke_Helper_Order_Interface
{
    /**
     * @param DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
     * @return DeutschePost_Internetmarke_Model_Franking_Interface
     * @throws Exception
     */
    public function persistShippingOrderItem(
        DeutschePost_Internetmarke_Model_Shipping_Order_Item $item
    ) {
        $franking = Mage::getModel('deutschepost_oneclickforapp/franking');
        $franking->setProductCode($item->getProductCode());
        $franking->setShipmentId($item->getShipmentId());

        $franking->setPplId($item->getPplId());
        $franking->setRowTotal($item->getPrice());
        $franking->save();

        return $franking;
    }

    /**
     * Build a tracking link based on the given track id.
     *
     * @param string $trackingNumber
     * @return string Empty string if track id was not found, tracking link otherwise.
     */
    public function getTrackingLink($trackingNumber)
    {
        $collection = Mage::getModel('deutschepost_oneclickforapp/franking')->getCollection();
        $collection->addFieldToFilter('track_id', array('eq' => $trackingNumber));

        /** @var DeutschePost_OneClickForApp_Model_Franking $franking */
        $franking = $collection->getFirstItem();
        if ($franking->isObjectNew()) {
            return '';
        }

        $url = 'https://www.deutschepost.de/sendung/simpleQueryResult.html';
        $date = Mage::app()->getLocale()->date($franking->getUpdatedAt());
        $query = array(
            'form.sendungsnummer' => $franking->getTrackId(),
            'form.einlieferungsdatum_tag' => $date->get(Zend_Date::DAY),
            'form.einlieferungsdatum_monat' => $date->get(Zend_Date::MONTH),
            'form.einlieferungsdatum_jahr' => $date->get(Zend_Date::YEAR),
        );

        return sprintf('%s?%s', $url, http_build_query($query, '', '&amp;'));
    }

    /**
     * Load a PDF file from given source and parse to Pdf object.
     *
     * @param string $filename
     * @return Zend_Pdf
     */
    public function downloadPdf($filename)
    {
        $pdfString = file_get_contents($filename);
        return Zend_Pdf::parse($pdfString);
    }
}
