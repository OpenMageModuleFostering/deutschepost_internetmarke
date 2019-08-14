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
 * DeutschePost_OneClickForApp_Model_Resource_Franking
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Resource_Franking
    extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('deutschepost_oneclickforapp/franking', 'internetmarke_id');
    }

    /**
     * Set dates on objects explicitly as column definition defaults do not save UTC dates.
     *
     * @param Mage_Core_Model_Abstract $object
     * @return $this
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        $date = Mage::getSingleton('core/date')->gmtDate();
        /** @var $object DeutschePost_OneClickForApp_Model_Franking */
        if (is_null($object->getId()) || ($this->_useIsObjectNew || $object->isObjectNew())) {
            $object->setCreatedAt($date);
        }
        $object->setUpdatedAt($date);

        return parent::_beforeSave($object);
    }
}
