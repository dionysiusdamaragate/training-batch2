<?php

namespace Icube\JneResi\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $table = $setup->getConnection()->newTable(
            $setup->getTable('jne_resi')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Id Resi'
        )->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Id Order'
        )->addColumn(
            'shipmenk_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Id Shipmenk'
        )->addColumn(
            'no_resi',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'No Resi'
        )->addColumn(
            'shipemen_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            50,
            [],
            'Sipemen Date'
        )->addColumn(
            'invoice_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            50,
            [],
            'Invoice Date'
        )->addColumn(
            'comment',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'Comment'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'Status'
        );
        $setup->getConnection()->createTable($table);
 
        $setup->endSetup();
    }
}