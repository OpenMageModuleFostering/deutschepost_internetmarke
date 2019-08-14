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
 * DeutschePost_ProdWs_Adminhtml_Dpim_ProductsController
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Adminhtml_Dpim_ProductsController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Retrieve and store page formats.
     */
    public function retrieveAction()
    {
        $wsGateway = Mage::getModel('deutschepost_prodws/gateway');

        try {
            $num = $wsGateway->getProductVersionsList();
            $msg = $this->__('Product list successfully updated with %d items.', $num);
            $this->_getSession()->addSuccess($msg);
        } catch (Exception $e) {
            $msg = $this->__('An error occurred while retrieving sales products. Please review log and try again.');
            $this->_getSession()->addError($msg);
            Mage::logException($e);
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
