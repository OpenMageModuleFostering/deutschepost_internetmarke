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
 * DeutschePost_ProdWs_Model_Product_Abstract
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @method string getProdwsId()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setProdwsId() setProdwsId(string $prodwsId)
 * @method string getName()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setName() setName(string $name)
 * @method int getPrice()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setPrice() setPrice(int $price)
 * @method string getDestination()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setDestination() setDestination(string $destination)
 * @method string getValidFrom()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setValidFrom() setValidFrom(string $validFrom)
 * @method string getValidTo()
 * @method DeutschePost_ProdWs_Model_Product_Abstract setValidTo() setValidTo(string $validTo)
 */
abstract class DeutschePost_ProdWs_Model_Product_Abstract extends Mage_Core_Model_Abstract
{
    const DESTINATION_NATIONAL      = 'national';
    const DESTINATION_INTERNATIONAL = 'international';
}
