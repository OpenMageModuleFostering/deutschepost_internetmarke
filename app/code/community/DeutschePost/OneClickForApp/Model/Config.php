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
 * DeutschePost_OneClickForApp_Model_Config
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Config
{
    const CONFIG_XML_PATH_WEBSERVICE_WSDL      = 'carriers/dpim/oneclickforapp_wsdl';
    const CONFIG_XML_PATH_PARTNER_ID           = 'carriers/dpim/oneclickforapp_partnerid';
    const CONFIG_XML_PATH_KEY_PHASE            = 'carriers/dpim/oneclickforapp_key_phase';
    const CONFIG_XML_PATH_PARTNER_SIGNATURE    = 'carriers/dpim/oneclickforapp_partnersignature';
    const CONFIG_XML_PATH_USER_TOKEN           = 'carriers/dpim/oneclickforapp_user_token';
    const CONFIG_XML_PATH_PORTOKASSE_USERNAME  = 'carriers/dpim/oneclickforapp_portokasse_username';
    const CONFIG_XML_PATH_PORTOKASSE_PASSWORD  = 'carriers/dpim/oneclickforapp_portokasse_password';
    const CONFIG_XML_PATH_PAGE_FORMAT          = 'carriers/dpim/oneclickforapp_pageformat';
    const CONFIG_XML_PATH_VALIDATOR            = 'dpim_config_validator/order/class';

    /**
     * Obtain WSDL URI.
     *
     * @return string
     */
    public function getWsdl()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_WEBSERVICE_WSDL);
    }

    /**
     * Obtain partner ID (global scope).
     *
     * @return string
     */
    public function getPartnerId()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_PARTNER_ID);
    }

    /**
     * Obtain key phase (global scope).
     *
     * @return string
     */
    public function getKeyPhase()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_KEY_PHASE);
    }

    /**
     * Obtain partner signature (global scope).
     *
     * @return string
     */
    public function getPartnerSignature()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_PARTNER_SIGNATURE);
    }

    /**
     * Obtain current user token,
     * Returns null if no valid token is available (not created the same day).
     *
     * @return string|null
     */
    public function getUserToken()
    {
        $tokenInfo = Mage::getStoreConfig(self::CONFIG_XML_PATH_USER_TOKEN);

        if (!$tokenInfo || !is_array($tokenInfo)
            || !isset($tokenInfo['date']) || !isset($tokenInfo['token'])
        ) {
            return null;
        }

        if ($tokenInfo['date'] !== Mage::getSingleton('core/date')->gmtDate('Y-m-d')) {
            return null;
        }

        return $tokenInfo['token'];
    }

    /**
     * Set user token alongside current date.
     *
     * @param string $token
     * @return void
     */
    public function setUserToken($token)
    {
        $tokenInfo = array(
            'date' => Mage::getSingleton('core/date')->gmtDate('Y-m-d'),
            'token' => $token
        );

        Mage::getModel('deutschepost_internetmarke/config')->saveConfig(
            self::CONFIG_XML_PATH_USER_TOKEN,
            serialize($tokenInfo)
        );
    }

    /**
     * Obtain username (global scope).
     *
     * @return string
     */
    public function getUsername()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_PORTOKASSE_USERNAME);
    }

    /**
     * Obtain password (global scope).
     *
     * @return string
     */
    public function getPassword()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_PORTOKASSE_PASSWORD);
    }

    /**
     * Obtain page format (global scope).
     *
     * @return DeutschePost_OneClickForApp_Model_Pageformat
     */
    public function getPageFormat()
    {
        $pageFormatId = Mage::getStoreConfig(self::CONFIG_XML_PATH_PAGE_FORMAT);
        return Mage::getModel('deutschepost_oneclickforapp/pageformat')->load($pageFormatId);
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
}
