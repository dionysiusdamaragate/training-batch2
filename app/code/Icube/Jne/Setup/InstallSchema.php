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
			$setup->getTable('icube_jne')
		)->addColumn(
			'id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
			'Entity Id'
		)->addColumn(
			'order_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			11,
			[],
			'Order id'
		)->addColumn(
			'shipment_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			11,
			[],
			'Shipment id'
		)->addColumn(
			'no_resi',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			[],
			'No Resi'
		)->addColumn(
			'shipment_date',
			\Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
			null,
			['nullable' => true, 'default' => null],
			'Shipment Date'
		)->addColumn(
			'invoice_date',
			\Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
			null,
			['nullable' => true, 'default' => null],
			'Order Counter'
		)->addColumn(
			'comment',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			null,
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