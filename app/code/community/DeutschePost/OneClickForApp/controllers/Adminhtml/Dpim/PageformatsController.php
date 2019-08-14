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
 * DeutschePost_OneClickForApp_Adminhtml_Dpim_PageformatsController
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Adminhtml_Dpim_PageformatsController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Retrieve and store page formats.
     */
    public function retrieveAction()
    {
        $wsGateway = Mage::getModel('deutschepost_oneclickforapp/gateway');

        try {
            $num = $wsGateway->retrievePageFormats();
            $msg = $this->__('%d page formats were retrieved successfully.', $num);
            $this->_getSession()->addSuccess($msg);
        } catch (Exception $e) {
            $msg = $this->__('An error occurred while retrieving page formats. Please review log and try again.');
            $this->_getSession()->addError($msg);
        }

        $this->_redirectReferer();
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
