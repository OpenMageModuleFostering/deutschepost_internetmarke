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
 * DeutschePost_OneClickForApp_Block_Adminhtml_System_Config_Pageformats
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Block_Adminhtml_System_Config_Pageformats
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Append link to refresh page formats.
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $html = parent::_getElementHtml($element);

        $canShowLink = Mage::getSingleton('admin/session')
            ->isAllowed('admin/sales/deutschepost_internetmarke');
        if (!$canShowLink) {
            return $html;
        }

        $template = 'deutschepost_1c4a/system/config/pageformats.phtml';
        $linkBlock = $this->getLayout()->createBlock(
            'adminhtml/template',
            'oneclickforapp_pageformat_refresh',
            array('template' => $template, 'module' => 'DeutschePost_OneClickForApp')
        );
        $linkBlock->assign('retrieve_pageformats_url', $this->getUrl('adminhtml/dpim_pageformats/retrieve'));

        return $html . $linkBlock->toHtml();
    }
}
