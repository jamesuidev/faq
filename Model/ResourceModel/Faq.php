<?php
namespace Emvigo\Faqn\Model\ResourceModel;

class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("emvigo_faqn", "id");
    }
}