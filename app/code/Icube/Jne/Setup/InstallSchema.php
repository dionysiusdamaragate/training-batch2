<?php

namespace Icube\Jne\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $table = $setup->getConnection()->newTable(
            $setup->getTable('jne_integ_belajar')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'ORDER ID'
        )->addColumn(
            'shipment_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'SHIPMENT ID'
        )->addColumn(
            'no_resi',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'NO RESI'
        )->addColumn(
            'shipment_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            null,
            [],
            'SHIPMENT_DATE'
         )->addColumn(
           'invoice_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            null,
            [],
           'INVOICE DATE'
         )->addColumn(
           'comment',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
           'COMMENT'
         )->addColumn(
           'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            ['default'=>null],
           'STATUS'
        );
        $setup->getConnection()->createTable($table);
 
        $setup->endSetup();
    }
}