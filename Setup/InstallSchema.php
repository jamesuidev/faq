<?php

namespace Emvigo\Faqn\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Farzeen\TestForm\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * install Articles table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('emvigo_faqn');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'question',
                    Table::TYPE_TEXT,
                    500,
                    ['nullable' => true],
                    'Question'
                )
                ->setComment('Post Table');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}