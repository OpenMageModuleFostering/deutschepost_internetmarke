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
 * DeutschePost_Internetmarke_Model_Soap_Adapter_Product_Interface
 *
 * Operations available in ProductInformation V1.1
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface
{
    // V1.0 operations:
    public function getProductList();
    public function getProductVersionsList();
    public function getCatalog();
    public function getCatalogList();
    public function registerEMailAdress();
    public function registerNotification();

    // V1.1 operations:
    public function getProductChangeInformation();
    public function getCatalogChangeInformation();

    // V2.0 operations:
    public function seekProduct();
    public function seekProductVersions();
    public function getProduct();
    public function getProductVersions();
    public function getChangedProductVersionsList();
}
