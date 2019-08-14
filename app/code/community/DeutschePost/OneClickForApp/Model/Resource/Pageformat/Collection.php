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
 * DeutschePost_OneClickForApp_Model_Resource_Pageformat_Collection
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Resource_Pageformat_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Model initialization.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_oneclickforapp/pageformat');
    }

    /**
     * Clean up all page formats and replace them with the current collection contents.
     *
     * @return $this
     * @throws Exception
     */
    public function replace()
    {
        $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
        try {
            $connection->beginTransaction();

            $connection->delete($this->getTable('deutschepost_oneclickforapp/pageformat'));
            $this->save();

            $connection->commit();
        } catch (Exception $e) {
            $connection->rollBack();
            throw $e;
        }

        return $this;
    }
}
