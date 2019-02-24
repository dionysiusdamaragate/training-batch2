<?php

namespace Icube\Jneresi\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('jne_shipment')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Id'
        )->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            [],
            'Order_id'
        )->addColumn(
            'shipment_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            [],
            'ID Shipment'
        )->addColumn(
            'no_resi',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            [],
            'No resi'
        )->addColumn(
            'shipment_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => true, 'default' => null],
            'Order Counter'
        )->addColumn(
            'invoice_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            ['nullable' => true, 'default' => null],
            'Status'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            ['nullable' => true, 'default' => null],
            'Status'
        );
        $setup->getConnection()->createTable($table);
 
        $setup->endSetup();
    }
}
