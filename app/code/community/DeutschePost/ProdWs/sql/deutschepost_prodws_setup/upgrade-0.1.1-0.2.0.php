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
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;


$connection = $installer->getConnection();

$connection->addColumn($installer->getTable('deutschepost_prodws/product_basic'),
    'price',
    array(
        'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'unsigned' => true,
        'nullable' => false,
        'comment'  => 'Price Eurocent'
    )
);
$connection->addColumn($installer->getTable('deutschepost_prodws/product_additional'),
    'price',
    array(
        'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'unsigned' => true,
        'nullable' => false,
        'comment'  => 'Price Eurocent'
    )
);
