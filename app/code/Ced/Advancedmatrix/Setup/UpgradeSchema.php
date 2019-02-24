<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2016 Amasty (https://www.amasty.com)
 * @package Amasty_Rules
 */

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ced\Advancedmatrix\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Catalog\Model\ResourceModel\Product\Attribute\Backend\Media;
use Magento\Catalog\Model\Product\Attribute\Backend\Media\ImageEntryConverter;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        //$compare = version_compare($context->getVersion(), '1.0.1', '<');

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $installer = $setup->getConnection();

            $installer->modifyColumn(
                    $setup->getTable('advanced_matrixrate'),
                    'city',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length' => 100,
                        'default' => '*',
                        'comment' => 'Destination City String'
                    ]
                );
        }


        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $installer = $setup->getConnection();

            $installer->addColumn(
                    $setup->getTable('advanced_matrixrate'),
                    'etd',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length' => 100,
                        'default' => '',
                        'comment' => 'Estimation Day'
                    ]
                );
        }





        $setup->endSetup();
    }
}