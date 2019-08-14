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
 * DeutschePost_Internetmarke_Model_Config
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Config
{
    const CONFIG_XML_PATH_SHIPPER_CONTACT = 'carriers/dpim/shipper_contact';
    const CONFIG_XML_PATH_ACTIVE = 'carriers/dpim/active';
    const CONFIG_XML_PATH_LOGGING_ENABLED = 'carriers/dpim/logging_enabled';
    const CONFIG_XML_PATH_LOG_LEVEL = 'carriers/dpim/log_level';
    const CONFIG_XML_PATH_CARRIER_ALLOWED_METHODS = 'carriers/dpim/allowed_methods';

    const CONFIG_XML_PATH_HELPER_PRODUCT = 'dpim_helper/product/class';
    const CONFIG_XML_PATH_HELPER_ORDER = 'dpim_helper/order/class';

    const CONFIG_XML_PATH_VALIDATOR = 'dpim_config_validator/base/class';

    /**
     * @param mixed $store
     * @return bool
     */
    public function isActive($store = null)
    {
        return Mage::getStoreConfigFlag(self::CONFIG_XML_PATH_ACTIVE, $store);
    }

    /**
     * Check if logging is enabled (global scope)
     *
     * @param int $level
     * @return bool
     */
    public function isLoggingEnabled($level = null)
    {
        $level = is_null($level) ? Zend_Log::DEBUG : $level;

        $isEnabled = Mage::getStoreConfigFlag(self::CONFIG_XML_PATH_LOGGING_ENABLED);
        $isLevelEnabled = (Mage::getStoreConfig(self::CONFIG_XML_PATH_LOG_LEVEL) >= $level);

        return ($isEnabled && $isLevelEnabled);
    }

    /**
     * @param mixed $store
     * @return Mage_Admin_Model_User
     */
    public function getShipperContact($store = null)
    {
        $adminUserId = Mage::getStoreConfig(self::CONFIG_XML_PATH_SHIPPER_CONTACT, $store);
        return Mage::getModel('admin/user')->load($adminUserId);
    }

    /**
     * Obtain allowed carrier shipping methods (overnight, priority, …).
     *
     * @param mixed $store
     * @return string[]
     */
    public function getAllowedMethods($store = null)
    {
        $allowedMethods = Mage::getStoreConfig(self::CONFIG_XML_PATH_CARRIER_ALLOWED_METHODS, $store);
        return explode(',', $allowedMethods);
    }

    /**
     * @return DeutschePost_Internetmarke_Helper_Product_Interface
     */
    public function getProductHelper()
    {
        $helperClass = Mage::getStoreConfig(self::CONFIG_XML_PATH_HELPER_PRODUCT);
        return Mage::helper($helperClass);
    }

    /**
     * @return DeutschePost_Internetmarke_Helper_Order_Interface
     */
    public function getOrderHelper()
    {
        $helperClass = Mage::getStoreConfig(self::CONFIG_XML_PATH_HELPER_ORDER);
        return Mage::helper($helperClass);
    }

    /**
     * Obtain config validator model from module configuration.
     *
     * @return DeutschePost_Internetmarke_Model_Config_Validator_Interface
     */
    public function getValidator()
    {
        $className = Mage::getStoreConfig(self::CONFIG_XML_PATH_VALIDATOR);
        return Mage::getModel($className);
    }

    /**
     * Obtain config validator models from module configuration.
     *
     * @return DeutschePost_Internetmarke_Model_Config_Validator_Interface[]
     */
    public function getValidators()
    {
        $validators = array();
        $configParts = explode('/', self::CONFIG_XML_PATH_VALIDATOR);
        $configNodes = Mage::getConfig()->getNode($configParts[0], 'default');
        foreach ($configNodes->children() as $validatorNode) {
            $className = $validatorNode->class;
            $model = Mage::getModel($className);
            if ($model) {
                $validators[]= $model;
            }
        }

        return $validators;
    }

    /**
     * Obtain sender address as configured in given store.
     * @see Mage_Shipping_Model_Shipping::requestToShipment()
     *
     * @param mixed $store
     * @return DeutschePost_Internetmarke_Model_Shipper
     */
    public function getShipper($store = null)
    {
        $shipper = Mage::getModel('deutschepost_internetmarke/shipper');
        $admin = $this->getShipperContact($store);

        $storeInfo = new Varien_Object(Mage::getStoreConfig('general/store_information', $store));
        $originStreet1 = Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_ADDRESS1, $store);
        $originStreet2 = Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_ADDRESS2, $store);
        $shipperRegionCode = Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_REGION_ID, $store);
        if (is_numeric($shipperRegionCode)) {
            $shipperRegionCode = Mage::getModel('directory/region')->load($shipperRegionCode)->getCode();
        }
        $shipperCountryCode = Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_COUNTRY_ID, $store);
        if (strlen($shipperCountryCode) !== 3) {
            $shipperCountryCode = Mage::getModel('directory/country')->loadByCode($shipperCountryCode)->getIso3Code();
        }

        $shipper->setShipperContactPersonName($admin->getName());
        $shipper->setShipperContactPersonFirstName($admin->getFirstname());
        $shipper->setShipperContactPersonLastName($admin->getLastname());
        $shipper->setShipperContactCompanyName($storeInfo->getName());
        $shipper->setShipperContactPhoneNumber($storeInfo->getPhone());
        $shipper->setShipperEmail($admin->getEmail());
        $shipper->setShipperAddressStreet(trim($originStreet1 . ' ' . $originStreet2));
        $shipper->setShipperAddressStreet1($originStreet1);
        $shipper->setShipperAddressStreet2($originStreet2);
        $shipper->setShipperAddressCity(Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_CITY, $store));
        $shipper->setShipperAddressStateOrProvinceCode($shipperRegionCode);
        $shipper->setShipperAddressPostalCode(Mage::getStoreConfig(Mage_Shipping_Model_Shipping::XML_PATH_STORE_ZIP, $store));
        $shipper->setShipperAddressCountryCode($shipperCountryCode);

        return $shipper;
    }

    /**
     * Update system config value in config object, config cache and database.
     *
     * @param $path
     * @param $value
     * @param int $storeId
     */
    public function saveConfig($path, $value, $storeId = Mage_Core_Model_App::ADMIN_STORE_ID)
    {
        $store = Mage::app()->getStore($storeId);
        $scope = 'default';

        if (intval($store->getId()) !== Mage_Core_Model_App::ADMIN_STORE_ID) {
            $scope = 'stores';
        }

        // update config node and config cache
        $store->setConfig($path, $value);

        // persist config node
        Mage::getConfig()->saveConfig($path, $value, $scope, $store->getId());
    }
}
