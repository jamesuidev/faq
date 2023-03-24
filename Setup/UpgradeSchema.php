<?php 
namespace Emvigo\Faqn\Setup; 
use Magento\Framework\Setup\UpgradeSchemaInterface; 
use Magento\Framework\Setup\ModuleContextInterface; 
use Magento\Framework\Setup\SchemaSetupInterface; 
use Magento\Framework\DB\Ddl\Table; 

class UpgradeSchema implements UpgradeSchemaInterface { 
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) { 
         if (version_compare($context->getVersion(), '1.0.1') < 0) { 
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('emvigo_faqn'),
                'answer',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Answer',
                ]
                );
                 $connection->addColumn(
                $setup->getTable('emvigo_faqn'),
                'is_approved',
                [
                    'type' => Table::TYPE_BOOLEAN,
                    'nullable' => false,
                    'default' => false,
                    'comment' => 'Approve'
                ],
            
            );
        }
    }
}