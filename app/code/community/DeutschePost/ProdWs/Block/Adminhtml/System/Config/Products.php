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
 * DeutschePost_ProdWs_Block_Adminhtml_System_Config_Products
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Block_Adminhtml_System_Config_Products
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
            $this->setTemplate('deutschepost_prodws/system/config/products.phtml');
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
     * Check if all required credentials are set in configuration.
     *
     * @return bool
     */
    public function isConfigValid()
    {
        $config = Mage::getModel('deutschepost_prodws/config');

        /** @var DeutschePost_ProdWs_Model_Config_Validator $validator */
        $validator = $config->getValidator();
        return $validator->validate(true);
    }

    /**
     * Check if there are sales products in the database.
     *
     * @return bool
     */
    public function isProductListAvailable()
    {
        $collection = Mage::getResourceModel('deutschepost_prodws/product_sales_collection');
        return ($collection->getSize() > 0);
    }

    /**
     * Obtain URL to fetch the product list
     *
     * @see DeutschePost_ProdWs_Model_Gateway::getProductVersionsList()
     * @return string
     */
    public function getProductListUrl()
    {
        return $this->getUrl('adminhtml/dpim_products/retrieve');
    }
}
