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
 * DeutschePost_OneClickForApp_Adminhtml_Sales_FrankingController
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Adminhtml_Sales_FrankingController
    extends Mage_Adminhtml_Controller_Action
{
    const MSG_WEBSERVICE_EXCEPTION = "The webservice request resulted in the following error: '%s'. Please review the logs.";

    const MSG_ORDER_ERR_NO_PARAMS = "Please select a franking order.";
    const MSG_ORDER_ERR_NOT_ORDERABLE = "The selected franking could not be ordered.";
    const MSG_ORDER_SUCCESS = "The selected franking was ordered successfully.";

    const MSG_MASSORDER_ERR_NO_PARAMS = "Please select franking orders.";
    const MSG_MASSORDER_ERR_NOT_ORDERABLE = "The selected franking(s) could not be ordered.";
    const MSG_MASSORDER_SUCCESS = "%d franking(s) were ordered successfully.";

    const MSG_MASSDELETE_ERR_NO_PARAMS = "Please select franking orders.";
    const MSG_MASSDELETE_EXCEPTION = "An error occurred while mass deleting items. Please review log and try again.";
    const MSG_MASSDELETE_SUCCESS = "Total of %d order(s) have been deleted.";

    const MSG_MASSPRINT_ERR_NO_PARAMS = "Please select franking orders.";

    /**
     * Init layout, menu and breadcrumb.
     *
     * @return $this
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('sales/deutschepost_internetmarke')
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('INTERNETMARKE'), $this->__('INTERNETMARKE'));
        return $this;
    }

    /**
     * Display franking overview.
     */
    public function indexAction()
    {
        $this->_initAction();
        $this->_title($this->__('Sales'));
        $this->_title($this->__('INTERNETMARKE'));

        $this->renderLayout();
    }

    /**
     * Init shipping order webservice request for one shipment.
     */
    public function orderAction()
    {
        $id = $this->getRequest()->getParam('franking_id');

        if (!$id) {
            $this->_getSession()->addError($this->__(self::MSG_ORDER_ERR_NO_PARAMS));
        } else {
            $gateway = Mage::getModel('deutschepost_oneclickforapp/gateway');

            try {
                $msg = self::MSG_ORDER_ERR_NOT_ORDERABLE;
                $num = $gateway->checkoutShoppingCartPDF(array($id));
                if ($num) {
                    $msg = self::MSG_ORDER_SUCCESS;
                }

                $this->_getSession()->addSuccess($this->__($msg));
            } catch (DeutschePost_OneClickForApp_Exception $e) {
                $this->_getSession()->addError($this->__($e->getMessage()));
            } catch (SoapFault $e) {
                $parser = Mage::getModel('deutschepost_oneclickforapp/webservice_parser_soap');
                $messages = $parser->parseFaultMessages($e);
                foreach ($messages as $message) {
                    $this->_getSession()->addError($this->__($message));
                }
            } catch (Exception $e) {
                $msg = self::MSG_WEBSERVICE_EXCEPTION;
                $this->_getSession()->addError($this->__($msg, $e->getMessage()));
            }
        }

        $this->_redirect('*/*/');
    }


    /**
     * Init shipping order webservice request for multiple shipments.
     */
    public function massOrderAction()
    {
        $ids = $this->getRequest()->getParam('franking_ids');

        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__(self::MSG_MASSORDER_ERR_NO_PARAMS));
        } else {
            $gateway = Mage::getModel('deutschepost_oneclickforapp/gateway');

            try {
                $msg = self::MSG_MASSORDER_ERR_NOT_ORDERABLE;
                $num = $gateway->checkoutShoppingCartPDF($ids);
                if ($num) {
                    $msg = self::MSG_MASSORDER_SUCCESS;
                }

                $this->_getSession()->addSuccess($this->__($msg, $num));
            } catch (DeutschePost_OneClickForApp_Exception $e) {
                $this->_getSession()->addError($this->__($e->getMessage()));
            } catch (SoapFault $e) {
                $parser = Mage::getModel('deutschepost_oneclickforapp/webservice_parser_soap');
                $messages = $parser->parseFaultMessages($e);
                foreach ($messages as $message) {
                    $this->_getSession()->addError($this->__($message));
                }
            } catch (Exception $e) {
                $msg = self::MSG_WEBSERVICE_EXCEPTION;
                $this->_getSession()->addError($this->__($msg, $e->getMessage()));
            }
        }

        $this->_redirect('*/*/');
    }

    /**
     * Delete order entries from queue.
     */
    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('franking_ids');
        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__(self::MSG_MASSDELETE_ERR_NO_PARAMS));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('deutschepost_oneclickforapp/franking')->load($id);
                    $model->delete();
                }
                $this->_getSession()->addSuccess($this->__(self::MSG_MASSDELETE_SUCCESS, count($ids)));
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $msg = self::MSG_MASSDELETE_EXCEPTION;
                $this->_getSession()->addError($this->__($msg));
                Mage::logException($e);
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Lookup shipment IDs and forward to original mass print action.
     */
    public function massPrintShippingLabelAction()
    {
        $ids = $this->getRequest()->getParam('franking_ids');
        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__(self::MSG_MASSPRINT_ERR_NO_PARAMS));
        } else {
            $collection = Mage::getModel('deutschepost_oneclickforapp/franking')->getCollection();
            $collection->addFieldToFilter('internetmarke_id', array('in' => $ids));
            $shipmentIds = $collection->getColumnValues('shipment_id');
            $this->_forward('massPrintShippingLabel', 'sales_order_shipment', 'admin', array(
                'massaction_prepare_key' => 'shipment_ids',
                'shipment_ids' => $shipmentIds,
            ));
        }
        $this->_redirect('*/sales_franking/');
    }

    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName = sprintf('internetmarke-%s.csv', Mage::getSingleton('core/date')->date('Ymd_His'));
        $grid     = $this->getLayout()->createBlock('deutschepost_oneclickforapp/adminhtml_sales_franking_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     * Check ACL.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/sales/deutschepost_internetmarke');
    }
}
