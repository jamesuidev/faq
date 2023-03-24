<?php
namespace Emvigo\Faqn\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Save extends Action
{
     /**
      *
      * @var FaqFactory
      */
    public $faqFactory;

    /**
     * This is a comment block
     */
    public function __construct(
        Context $context,
        \Emvigo\Faqn\Model\FaqFactory $faqFactory
    ) {
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }
    /**
     * This is a comment block
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if (isset($data['id']) && $data['id']) {
            $model = $this->faqFactory->create()->load($data['id']);
            $model->setName($data['name'])
                ->setQuestion($data['question'])
                ->setAnswer($data['answer'])
                ->setis_approved($data['is_approved'])
                ->save();
            $this->messageManager->addSuccess(__('You have approved question successfully.'));
        }
  
        return $resultRedirect->setPath('*/*/');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Emvigo_Faqn::save');
    }
}
