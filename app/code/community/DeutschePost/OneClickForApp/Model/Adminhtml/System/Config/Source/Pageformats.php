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
 * DeutschePost_OneClickForApp_Model_Adminhtml_System_Config_Source_Pageformats
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Adminhtml_System_Config_Source_Pageformats
{
    /**
     * Load page format option groups for config form element.
     *
     * @return mixed[]
     */
    public function toOptionArray()
    {
        $collection = Mage::getModel('deutschepost_oneclickforapp/pageformat')
            ->getCollection()
            ->setOrder('name', Varien_Data_Collection_Db::SORT_ORDER_ASC)
        ;

        $options = array(
            'standard' => array(
                'label' => Mage::helper('deutschepost_oneclickforapp/data')->__('Standard Formats'),
                'value' => array(),
            ),
            'brother' => array(
                'label' => 'Brother',
                'value' => array(),
            ),
            'dymo' => array(
                'label' => 'Dymo',
                'value' => array(),
            ),
            'herma' => array(
                'label' => 'Herma',
                'value' => array(),
            ),
            'seiko' => array(
                'label' => 'Seiko',
                'value' => array(),
            ),
            'zweckform' => array(
                'label' => 'Zweckform',
                'value' => array(),
            ),
        );

        foreach ($collection as $pageFormat) {
            $company = strstr(strtolower($pageFormat->getName()), ' ', true);
            $companyNames = array_keys($options);

            if (!in_array($company, $companyNames)) {
                $company = 'standard';
            }

            $options[$company]['value'][]= array(
                'value' => $pageFormat->getId(),
                'label' => sprintf(
                    "%s%s",
                    $pageFormat->getName(),
                    $pageFormat->getIsAddressPossible() ? ' (A)' : ''
                ),
            );
        }

        array_unshift($options, array(
            'value' => '',
            'label' => Mage::helper('adminhtml')->__('-- Please Select --')
        ));

        return $options;
    }
}
