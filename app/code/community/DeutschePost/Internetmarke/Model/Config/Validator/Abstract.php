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
 * DeutschePost_Internetmarke_Model_Config_Validator_Abstract
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Config_Validator_Abstract
{
    const EXPECTED_VALUE_TRUE     = '__validation_type_enabled__';
    const EXPECTED_VALUE_FALSE    = '__validation_type_disabled__';
    const EXPECTED_VALUE_REQUIRED = '__validation_type_required__';

    /**
     * Settings required for the current module to work properly, e.g.:
     *
     * $requiredSettings = array('carriers/dpim/active' => true)
     *
     * @var mixed[]
     */
    protected $requiredSettings = array();

    /**
     * List of validation failures alongside expected values, e.g.:
     * $validationFailures = array('carriers/dpim/active' => 1)
     *
     * @var mixed[]
     */
    protected $validationFailures = array();

    /**
     * Compare given expected value with config value.
     *
     * @param string $path
     * @param bool|string $expectedValue
     * @return bool
     */
    protected function validateConfigPath($path, $expectedValue)
    {
        if ($expectedValue === self::EXPECTED_VALUE_TRUE) {
            // test boolean TRUE
            return Mage::getStoreConfigFlag($path);
        }
        if ($expectedValue === self::EXPECTED_VALUE_FALSE) {
            // test boolean FALSE
            return !Mage::getStoreConfigFlag($path);
        }
        if ($expectedValue === self::EXPECTED_VALUE_REQUIRED) {
            // test occurrence of any value
            return (strlen(Mage::getStoreConfig($path)) > 0);
        }

        // test value
        return (Mage::getStoreConfig($path) === $expectedValue);
    }

    /**
     * Post-process expected value, e.g. translate.
     *
     * @param $expectedValue
     * @return string
     */
    protected function getConfigValue($expectedValue)
    {
        if ($expectedValue === self::EXPECTED_VALUE_TRUE) {
            $str = 'Yes';
        } elseif ($expectedValue === self::EXPECTED_VALUE_FALSE) {
            $str = 'No';
        } elseif ($expectedValue === self::EXPECTED_VALUE_REQUIRED) {
            $str = 'Not Empty';
        } else {
            $str = $expectedValue;
        }

        return Mage::helper('deutschepost_internetmarke/data')->__($str);
    }

    /**
     * Run validator, optionally interrupt on failure.
     *
     * @param bool $stopOnFailure
     * @return bool
     */
    public function validate($stopOnFailure = false)
    {
        foreach ($this->requiredSettings as $path => $expectedValue) {
            if (!$this->validateConfigPath($path, $expectedValue)) {
                $this->validationFailures[$path] = $this->getConfigValue($expectedValue);
                if ($stopOnFailure) {
                    break;
                }
            }
        }

        return empty($this->validationFailures);
    }

    /**
     * Obtrain error messages.
     *
     * @see $validationFailures
     * @return mixed[]
     */
    public function getFailures()
    {
        return $this->validationFailures;
    }
}
