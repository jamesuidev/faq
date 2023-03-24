<?php

namespace Emvigo\Faqn\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{

    public function execute()
    {   
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            //  $resultPage->setActiveMenu('Emvigo_Faqn:edit');
        $resultPage->getConfig()->getTitle()->prepend(__("Edit Faqs"));
        return $resultPage;
    }
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Emvigo_Faqn::edit');
    }
}
