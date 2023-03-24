<?php
namespace Emvigo\Faqn\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;

class Add extends Action
{
    public function __construct(
        Context $context,
    PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Ask your question?'));
        $layout = $resultPage->getLayout();

        return $resultPage;
    }
}
