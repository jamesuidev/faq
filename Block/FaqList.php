<?php
namespace Emvigo\Faqn\Block;

class FaqList extends \Magento\Framework\View\Element\Template
{
    public $faqCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Emvigo\Faqn\Model\ResourceModel\Faq\CollectionFactory $faqCollection,
        array $data = []
    ) {
        $this->faqCollection = $faqCollection;
        parent::__construct($context, $data);
    }

    public function getFaqs()
    {
        $collection = $this->faqCollection->create();
        $collection -> addFieldToFilter('is_approved',1);

        return $collection;
    }
}