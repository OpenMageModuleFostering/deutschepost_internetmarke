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
 * DeutschePost_OneClickForApp_Block_Adminhtml_Sales_Franking
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Block_Adminhtml_Sales_Franking
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'deutschepost_oneclickforapp';
        $this->_controller = 'adminhtml_sales_franking';
        $this->_headerText = $this->__('Deutsche Post INTERNETMARKE');
        parent::__construct();

        $this->_removeButton('add');
    }
}
