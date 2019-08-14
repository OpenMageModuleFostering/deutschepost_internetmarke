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
 * DeutschePost_Internetmarke_Model_Config_Validator_Chain
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Config_Validator_Chain
{
    /**
     * @var DeutschePost_Internetmarke_Model_Config_Validator_Interface[]
     */
    protected $validators = array();

    /**
     * List of validation failures, e.g.:
     * $validationFailures = array('carriers/dpim/active' => 1)
     *
     * @var mixed[]
     */
    protected $validationFailures = array();

    /**
     * Obtain config path label.
     *
     * @param string $path
     * @param string $delimiter
     * @return string
     */
    protected function getConfigLabel($path, $delimiter = '>')
    {
        $parts = explode('/', $path);

        if (!count($parts) == 3) {
            return $path;
        }

        $sections = Mage::getSingleton('adminhtml/config')->getSections();

        $fieldLabelPath = sprintf('//sections/%s/groups/%s/fields/%s/label', $parts[0], $parts[1], $parts[2]);
        $groupLabelPath = sprintf('//sections/%s/groups/%s/label', $parts[0], $parts[1]);
        $sectionLabelPath = sprintf('//sections/%s/label', $parts[0]);

        $sectionLabel = $sections->xpath($sectionLabelPath);
        $groupLabel = $sections->xpath($groupLabelPath);
        $fieldLabel = $sections->xpath($fieldLabelPath);

        $label = sprintf(
            '%s %s %s %s %s',
            Mage::helper('deutschepost_internetmarke/data')->__((string)$sectionLabel[0]),
            $delimiter,
            Mage::helper('deutschepost_internetmarke/data')->__((string)$groupLabel[0]),
            $delimiter,
            Mage::helper('deutschepost_internetmarke/data')->__((string)$fieldLabel[0])
        );

        return $label;
    }

    /**
     * Add a validator to check config settings.
     *
     * @param DeutschePost_Internetmarke_Model_Config_Validator_Interface $validator
     * @return $this
     */
    public function addValidator(DeutschePost_Internetmarke_Model_Config_Validator_Interface $validator)
    {
        $this->validators[]= $validator;
        return $this;
    }

    /**
     * Set all validators at once.
     *
     * @param DeutschePost_Internetmarke_Model_Config_Validator_Interface[] $validators
     * @return $this
     */
    public function setValidators(array $validators)
    {
        $this->validators = array();
        foreach ($validators as $validator) {
            $this->addValidator($validator);
        }
        return $this;
    }

    /**
     * Run all registered validators, optionally interrupted on failure.
     *
     * @param bool $stopOnFailure
     * @return bool The validation result.
     */
    public function run($stopOnFailure = true)
    {
        foreach ($this->validators as $validator) {
            $result = $validator->validate();
            if (!$result) {
                $this->validationFailures += $validator->getFailures();
                if ($stopOnFailure) {
                    break;
                }
            }
        }

        return empty($this->validationFailures);
    }

    /**
     * Obtain error messages with config labels, e.g.:
     * $failures = array('carriers/dpim/active' => array(
     *     'label' => 'Shipping Methods > Deutsche Post INTERNETMARKE > Enabled for Checkout',
     *     'value' => 1
     * ))
     *
     * @return mixed[]
     */
    public function getFailures()
    {
        $failures = array();
        foreach ($this->validationFailures as $path => $expectedValue) {
            $failures[$path] = array(
                'label' => $this->getConfigLabel($path),
                'value' => $expectedValue,
            );
        }
        return $failures;
    }
}
