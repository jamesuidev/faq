<?php
namespace Emvigo\Faqn\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Filesystem;


class Save extends Action
{
    public $messageManager;
    public function __construct(
        Context $context,
        \Emvigo\Faqn\Model\FaqFactory $faqFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        Filesystem $filesystem,
        
    ) {
        $this->faqFactory = $faqFactory;
        $this->filesystem = $filesystem;
        
        parent::__construct($context);
    }

    public function execute()
    { 
       
    $data = $this->getRequest()->getParams();
   
    $model = $this->faqFactory->create();
    $model->setName($data['name']);
    $model->setQuestion($data['question']);
    // $model->setAnswer($data['answer']);
    // Check if image is uploaded
    $model->save();
    $this->messageManager->addSuccess(__('Your question has been submitted for answering'));
    
    return $this->resultRedirectFactory->create()->setPath('faq/manage/add');
    }
}