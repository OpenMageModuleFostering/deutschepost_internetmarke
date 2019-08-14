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
 * DeutschePost_Internetmarke_Block_Adminhtml_System_Config_Validation
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Block_Adminhtml_System_Config_Validation
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * List of validation failures.
     * @var array|null
     */
    protected $validationFailures = null;

    /**
     * Init template
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if (!$this->getTemplate()) {
            $this->setTemplate('deutschepost_im/system/config/validation.phtml');
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
        return $this->_getElementHtml($element);
    }

    /**
     * Render the template
     *
     * Note: _decorateRowHtml() does not exist in Magento < CE 1.7.0.1,
     * For backwards compatibility, implement the missing method here in this class.
     *
     * @see Mage_Adminhtml_Block_System_Config_Form_Field::_decorateRowHtml()
     * @link https://github.com/OpenMage/magento-mirror/blob/1.7.0.1/app/code/core/Mage/Adminhtml/Block/System/Config/Form/Field.php#L144
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $html = sprintf('<td colspan="5">%s</td>', $this->_toHtml());
        return $this->_decorateRowHtml($element, $html);
    }

    /**
     * Check if the current configuration is valid, set validation messages.
     *
     * @return bool
     */
    public function isConfigValid()
    {
        $config = Mage::getModel('deutschepost_internetmarke/config');
        $moduleValidators = $config->getValidators();

        $validator = Mage::getModel('deutschepost_internetmarke/config_validator_chain');
        $validator->setValidators($moduleValidators);
        $isValid = $validator->run();
        $this->validationFailures = $validator->getFailures();

        return $isValid;
    }

    /**
     * Obtain validation failure messages. Runs validators on first call.
     *
     * @return mixed[]
     */
    public function getValidationFailures()
    {
        if (!is_array($this->validationFailures)) {
            $this->isConfigValid();
        }

        return $this->validationFailures;
    }
}
