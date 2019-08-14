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

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;


$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_prodws/product_additional'))
    ->addColumn('additionalproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Additional Product ID')
    ->addColumn('prodws_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'ProdWS Reference ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(
        'nullable'  => false,
    ), 'ProdWS Name')
    ->addColumn('version', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'ProdWS Version')
    ->addColumn('destination', Varien_Db_Ddl_Table::TYPE_VARCHAR, 16, array(
        'nullable'  => false,
    ), 'Destination Flag')
    ->addColumn('valid_from', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Valid From Date')
    ->addColumn('valid_to', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Valid To Date')
    ->addIndex(
        $installer->getIdxName('deutschepost_prodws/product_additional', array('prodws_id', 'version'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        array('prodws_id', 'version'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
    )
    ->setComment('Deutsche Post Additional Product')
;
$installer->getConnection()->createTable($table);


$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_prodws/product_basic'))
    ->addColumn('basicproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Basic Product ID')
    ->addColumn('prodws_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'ProdWS Reference ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(
        'nullable'  => false,
    ), 'ProdWS Name')
    ->addColumn('version', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'ProdWS Version')
    ->addColumn('destination', Varien_Db_Ddl_Table::TYPE_VARCHAR, 16, array(
        'nullable'  => false,
    ), 'Destination Flag')
    ->addColumn('valid_from', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Valid From Date')
    ->addColumn('valid_to', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Valid To Date')
    ->addIndex(
        $installer->getIdxName('deutschepost_prodws/product_basic', array('prodws_id', 'version'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        array('prodws_id', 'version'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
    )
    ->setComment('Deutsche Post Basic Product')
;
$installer->getConnection()->createTable($table);


$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_prodws/product_sales'))
    ->addColumn('salesproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Sales Product ID')
    ->addColumn('basicproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Basic Product')
    ->addColumn('source_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'Source System Reference ID')
    ->addColumn('prodws_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'ProdWS System Reference ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(
        'nullable'  => false,
    ), 'Name')
    ->addColumn('destination', Varien_Db_Ddl_Table::TYPE_VARCHAR, 16, array(
        'nullable'  => false,
    ), 'Destination Flag')
    ->addColumn('valid_from', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Valid From Date')
    ->addColumn('valid_to', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Valid To Date')
    ->addColumn('ppl_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'PPL Reference')
    ->addColumn('price', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Price Eurocent')
    ->addForeignKey(
        $installer->getFkName('deutschepost_prodws/product_sales', 'basicproduct_id', 'deutschepost_prodws/product_basic', 'basicproduct_id'),
        'basicproduct_id',
        $installer->getTable('deutschepost_prodws/product_basic'),
        'basicproduct_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addIndex(
        $installer->getIdxName('deutschepost_prodws/product_sales', array('source_id', 'prodws_id', 'ppl_id'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        array('source_id', 'prodws_id', 'ppl_id'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
    )
    ->setComment('Deutsche Post Sales Product')
;
$installer->getConnection()->createTable($table);


$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_prodws/product_sales_additional'))
    ->addColumn('salesproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Sales Product ID')
    ->addColumn('additionalproduct_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'primary'   => true,
    ), 'Additional Product ID')
    ->addForeignKey($installer->getFkName('deutschepost_prodws/product_sales_additional', 'salesproduct_id', 'deutschepost_prodws/product_sales', 'salesproduct_id'),
        'salesproduct_id', $installer->getTable('deutschepost_prodws/product_sales'), 'salesproduct_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($installer->getFkName('deutschepost_prodws/product_sales_additional', 'additionalproduct_id', 'deutschepost_prodws/product_additional', 'additionalproduct_id'),
        'additionalproduct_id', $installer->getTable('deutschepost_prodws/product_additional'), 'additionalproduct_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Deutsche Post Additional Product To Sales Product Linkage Table')
;
$installer->getConnection()->createTable($table);
