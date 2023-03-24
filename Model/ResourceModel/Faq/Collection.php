<?php
namespace Emvigo\Faqn\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    
    public function _construct()
    {
        $this->_init(
            \Emvigo\Faqn\Model\Faq::class,
            \Emvigo\Faqn\Model\ResourceModel\Faq::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.id';
    }
}