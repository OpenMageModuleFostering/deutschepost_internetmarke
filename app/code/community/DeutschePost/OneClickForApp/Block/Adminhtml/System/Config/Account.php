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
 * DeutschePost_OneClickForApp_Block_Adminhtml_System_Config_Account
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Block_Adminhtml_System_Config_Account
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Init template
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if (!$this->getTemplate()) {
            $this->setTemplate('deutschepost_1c4a/system/config/account.phtml');
        }

        return $this;
    }

    /**
     * Unset some non-related element parameters
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Render the template
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->_toHtml();
    }

    /**
     * Obtain link to "Portokasse laden" account form for the current user.
     *
     * @return string
     */
    public function getPortokasseUrl()
    {
        return sprintf(
            'https://internetmarke.deutschepost.de/internetmarke/start.do?user.showLogin=true&user.name=%s',
            Mage::getModel('deutschepost_oneclickforapp/config')->getUsername()
        );
    }

    /**
     * Obtain link to "Password vergessen" account form.
     *
     * @return string
     */
    public function getPasswordUrl()
    {
        return 'https://internetmarke.deutschepost.de/internetmarke/franking.do#stn.User.showPwdLostDialog';
    }
}
