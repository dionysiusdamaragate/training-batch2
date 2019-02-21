<?php
namespace Icube\Exercise\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		$table = $setup->getConnection()->newTable(
			$setup->getTable('icube_employee')
		)->addColumn(
			'id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
			'Entity Id'
		)->addColumn(
			'name',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			[],
			'Trainee Name'
		)->addColumn(
			'email',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			100,
			[],
			'Email'
		)->addColumn(
			'division',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			50,
			[],
			'Division'
		)->addColumn(
			'status',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			50,
			[],
			'Status'
		)->addColumn(
			'order_counter',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			11,
			[],
			'Order Counter'
		);
		$setup->getConnection()->createTable($table);
		$setup->endSetup();
	}
}