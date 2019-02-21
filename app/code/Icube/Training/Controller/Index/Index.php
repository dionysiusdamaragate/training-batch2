<?php

namespace Icube\Training\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Create extends Action
{
   protected $resultPageFactory = false;

    public function __construct(
       Context $context,
       \Magento\Framework\View\Result\PageFactory $resultPageFactory,
       \Icube\Training\Model\TraineeFactory $createFactory
    )
    {

       parent::__construct($context);
       $this->resultPageFactory = $resultPageFactory;
       $this->createFactory = $createFactory;


    }

    public function execute()
    {
       $reviewCollection = $this->createFactory->create();
       $reviewCollection->setName('name');
       $reviewCollection->setEmail('email');
       $reviewCollection->setDivision('division');
       $reviewCollection->save();

       $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('training/trainee/index');
       return $resultRedirect;
    }


}
