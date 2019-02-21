<?php

namespace Icube\Quiz\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Create extends Action
{
    protected $resultPageFactory = false;
    
	public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Icube\Quiz\Model\TraineeFactory $createFactory
	)
	{
        
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->createFactory = $createFactory;
 

	}

	public function execute()
	{
        $param = (array) $this->_request->getPost();
        $reviewCollection = $this->createFactory->create();
        $reviewCollection->setName($param['name']);
        $reviewCollection->setEmail($param['email']);
        $reviewCollection->setDivision($param['division']);
        $reviewCollection->save();
        
        $resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('quiz/trainee/index');
        return $resultRedirect;
	}


}