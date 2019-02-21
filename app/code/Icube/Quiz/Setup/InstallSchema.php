<?php

namespace Icube\Quiz\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $table = $setup->getConnection()->newTable(
            $setup->getTable('ICUBE_EMPLOYEE')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'NAMA'
        )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'EMAIL'
        )->addColumn(
            'division',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'DIVISI'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'STATUS'
         )->addColumn(
           'order_container',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
           'ORDER_COUNTER'
        );
        $setup->getConnection()->createTable($table);
 
        $setup->endSetup();
    }
}