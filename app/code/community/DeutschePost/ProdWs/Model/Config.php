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
 * DeutschePost_ProdWs_Model_Config
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Config
{
    const CONFIG_XML_PATH_SCHEDULE        = 'carriers/dpim/prodws_schedule';
    const CONFIG_XML_PATH_WEBSERVICE_WSDL = 'carriers/dpim/prodws_wsdl';
    const CONFIG_XML_PATH_MANDANT_ID      = 'carriers/dpim/prodws_mandantid';
    const CONFIG_XML_PATH_USERNAME        = 'carriers/dpim/prodws_username';
    const CONFIG_XML_PATH_PASSWORD        = 'carriers/dpim/prodws_password';

    const CONFIG_XML_PATH_LAST_QUERY_TS_PRODUCT = 'carriers/dpim/prodws_query_ts_product';
    const CONFIG_XML_PATH_LAST_QUERY_TS_CATALOG = 'carriers/dpim/prodws_query_ts_catalog';

    const CONFIG_XML_PATH_VALIDATOR       = 'dpim_config_validator/product/class';

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
     * Obtain ProdWs mandant ID (global scope).
     *
     * @return string
     */
    public function getMandantId()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_MANDANT_ID);
    }

    /**
     * Obtain ProdWs username (global scope).
     *
     * @return string
     */
    public function getUsername()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_USERNAME);
    }

    /**
     * Obtain ProdWs password (global scope).
     *
     * @return string
     */
    public function getPassword()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_PASSWORD);
    }

    /**
     * Obtain timestamp of last product updates check.
     *
     * @return string
     */
    public function getProductInfoLastQueryTs()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_LAST_QUERY_TS_PRODUCT);
    }

    /**
     * Set timestamp of last product updates check.
     *
     * @param int $timestamp
     * @return void
     */
    public function setProductInfoLastQueryTs($timestamp)
    {
        Mage::getModel('deutschepost_internetmarke/config')->saveConfig(
            self::CONFIG_XML_PATH_LAST_QUERY_TS_PRODUCT,
            $timestamp
        );
    }

    /**
     * Obtain timestamp of last catalog updates check.
     *
     * @return string
     */
    public function getCatalogInfoLastQueryTs()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_LAST_QUERY_TS_CATALOG);
    }

    /**
     * Set timestamp of last catalog updates check.
     *
     * @param int $timestamp
     * @return void
     */
    public function setCatalogInfoLastQueryTs($timestamp)
    {
        Mage::getModel('deutschepost_internetmarke/config')->saveConfig(
            self::CONFIG_XML_PATH_LAST_QUERY_TS_CATALOG,
            $timestamp
        );
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
