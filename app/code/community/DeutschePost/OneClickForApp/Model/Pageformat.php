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
 * DeutschePost_OneClickForApp_Model_Pageformat
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @method int getSourceId()
 * @method DeutschePost_OneClickForApp_Model_Pageformat setSourceId() setSourceId(int $sourceId)
 * @method string getName()
 * @method DeutschePost_OneClickForApp_Model_Pageformat setName() setName(string $name)
 * @method string getDescription()
 * @method DeutschePost_OneClickForApp_Model_Pageformat setDescription() setDescription(string $description)
 * @method bool getIsAddressPossible()
 * @method DeutschePost_OneClickForApp_Model_Pageformat setIsAddressPossible() setIsAddressPossible(bool $isAddressPossible)
 * @method string getType()
 * @method DeutschePost_OneClickForApp_Model_Pageformat setType() setType(string $type)
 */
class DeutschePost_OneClickForApp_Model_Pageformat
    extends Mage_Core_Model_Abstract
{
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_oneclickforapp/pageformat');
    }
}
