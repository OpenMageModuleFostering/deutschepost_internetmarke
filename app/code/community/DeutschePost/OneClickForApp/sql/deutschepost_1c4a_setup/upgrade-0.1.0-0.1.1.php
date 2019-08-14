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

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$table = $installer->getConnection()
    ->newTable($installer->getTable('deutschepost_oneclickforapp/pageformat'))
    ->addColumn('pageformat_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Internetmarke Label Format ID')
    ->addColumn('source_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Source System Reference ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ), 'Internetmarke Label Format Name')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
        'default' => '',
    ), 'Internetmarke Label Format Description')
    ->addColumn('is_address_possible', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
        'nullable'  => false,
        'default' => 0
    ), 'Internetmarke Label Format Can Print Address')
    ->addColumn('type', Varien_Db_Ddl_Table::TYPE_VARCHAR, 32, array(
        'nullable'  => false,
        'default' => '',
    ), 'Internetmarke Label Format Type')
    ->setComment('Deutsche Post Internetmarke Page Format')
;
$installer->getConnection()->createTable($table);
