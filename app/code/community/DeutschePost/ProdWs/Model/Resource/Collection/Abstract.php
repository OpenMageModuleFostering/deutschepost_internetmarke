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
 * DeutschePost_ProdWs_Model_Resource_Collection_Abstract
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class DeutschePost_ProdWs_Model_Resource_Collection_Abstract
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Obtain all entities that are valid at the given date.
     *
     * @param string $date GMT date
     * @return $this
     * @throws Zend_Date_Exception
     */
    public function addDateFilter($date = null)
    {
        if (is_null($date)) {
            $date = Mage::getSingleton('core/date')->gmtDate();
        }

        $date = Mage::app()->getLocale()->date($date, null, null, false);
        $date = $date->toString('yyyy-MM-dd HH:mm:ss'); // db datetime format

        $this
            ->addFieldToFilter('valid_from', array('lteq' => $date))
            ->addFieldToFilter('valid_to', array(
                array('gteq' => $date),
                array('null' => true)
            ))
        ;

        return $this;
    }
}
