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
 * DeutschePost_ProdWs_Model_Resource_Product_Collection_Abstract
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Resource_Product_Collection_Abstract
    extends DeutschePost_ProdWs_Model_Resource_Collection_Abstract
{
    /**
     * Obtain all products valid for a given destination.
     *
     * @see DeutschePost_ProdWs_Model_Product_Abstract::DESTINATION_NATIONAL
     * @see DeutschePost_ProdWs_Model_Product_Abstract::DESTINATION_INTERNATIONAL
     * @param string $destination
     * @return $this
     */
    public function addDestinationFilter($destination)
    {
        $this->addFieldToFilter('destination', array('eq' => $destination));
        return $this;
    }
}
