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
 * DeutschePost_OneClickForApp_Model_Config_Validator
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Config_Validator
    extends DeutschePost_Internetmarke_Model_Config_Validator_Abstract
    implements DeutschePost_Internetmarke_Model_Config_Validator_Interface
{
    /**
     * Settings required for the current module to work properly.
     *
     * @var mixed[]
     */
    protected $requiredSettings = array(
        'general/store_information/name' => self::EXPECTED_VALUE_REQUIRED,
        'general/store_information/phone' => self::EXPECTED_VALUE_REQUIRED,
        'shipping/origin/street_line1' => self::EXPECTED_VALUE_REQUIRED,
        'shipping/origin/city' => self::EXPECTED_VALUE_REQUIRED,
        'shipping/origin/region_id' => self::EXPECTED_VALUE_REQUIRED,
        'shipping/origin/postcode' => self::EXPECTED_VALUE_REQUIRED,
        'shipping/origin/country_id' => self::EXPECTED_VALUE_REQUIRED,
        'carriers/dpim/oneclickforapp_partnerid' => self::EXPECTED_VALUE_REQUIRED,
        'carriers/dpim/oneclickforapp_partnersignature' => self::EXPECTED_VALUE_REQUIRED,
        'carriers/dpim/oneclickforapp_portokasse_username' => self::EXPECTED_VALUE_REQUIRED,
        'carriers/dpim/oneclickforapp_portokasse_password' => self::EXPECTED_VALUE_REQUIRED,
        'carriers/dpim/oneclickforapp_pageformat' => self::EXPECTED_VALUE_REQUIRED,
    );
}
