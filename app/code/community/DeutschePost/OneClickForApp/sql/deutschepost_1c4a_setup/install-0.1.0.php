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

/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_oneclickforapp/franking'))
    ->addColumn('internetmarke_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Internetmarke Order Item ID')
    ->addColumn('shop_order_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 18, array(
        'nullable'  => true,
    ), 'External Order Reference ID')
    ->addColumn('shipment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
    ), 'Shipment Reference')
    ->addColumn('position', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => true,
    ), 'Internetmarke Order Item Position')
    ->addColumn('product_code', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'Internetmarke Order Item Product Code')
    ->addColumn('voucher_id', Varien_Db_Ddl_Table::TYPE_CHAR, 20, array(
        'nullable'  => true,
    ), 'Internetmarke Order Item Voucher Code')
    ->addColumn('track_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => true,
    ), 'Internetmarke Order Item Tracking Barcode')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => 0,
    ), 'Internetmarke Order Item Exchange Status')
    ->addColumn('ppl_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'PPL Reference')
    ->addColumn('row_total', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => 0,
    ), 'Internetmarke Order Item Amount in Eurocent')
    ->addColumn('link', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => true,
    ), 'PDF Download Link')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Updated At')
    ->addForeignKey(
        $installer->getFkName('deutschepost_oneclickforapp/franking', 'shipment_id', 'sales/shipment', 'entity_id'),
        'shipment_id',
        $installer->getTable('sales/shipment'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Deutsche Post Internetmarke Queue Item')
;
$installer->getConnection()->createTable($table);
