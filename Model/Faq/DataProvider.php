<?php
namespace Emvigo\Faqn\Model\Faq;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $loadedData;

    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Emvigo\Faqn\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory,
        StoreManagerInterface $storeManager,
        

        array $meta = [],
        array $data = []
    ) {
        $this->collection = $faqCollectionFactory->create();
        $this->storeManager = $storeManager;

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

public function getData()
{
    if (isset($this->loadedData)) {
        return $this->loadedData;
    }

    $items = $this->collection->getItems();
    foreach ($items as $form) {
        $formData = $form->getData();
        
        // Add image path to the loaded data

        $this->loadedData[$form->getId()] = $formData;
    }
        
    return $this->loadedData;
}

}
