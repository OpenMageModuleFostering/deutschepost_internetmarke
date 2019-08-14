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
 * DeutschePost_Internetmarke_Model_Product
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Product
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $price;

    /**
     * @var DeutschePost_Internetmarke_Model_Service[]
     */
    public $services = array();

    public function __construct($args)
    {
        if (!isset($args['id']) || !isset($args['name']) || !isset($args['price'])) {
            throw new DeutschePost_Internetmarke_Exception('Missing required parameters.');
        }

        $this->id    = $args['id'];
        $this->name  = $args['name'];
        $this->price = $args['price'];
        if (isset($args['services'])) {
            if (!is_array($args['services'])) {
                $this->services = array($args['services']);
            } else {
                $this->services = $args['services'];
            }
        }
    }
}
