<?php 

namespace Icube\Shanti\Controller\Custom;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Create extends Action
{
  protected $resultPageFactory;
  protected $traineeFactory;
  
  public function __construct(
    Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Icube\Shanti\Model\TraineeFactory $traineeFactory
  ){
    $this->resultPageFactory = $resultPageFactory;
    $this->traineeFactory = $traineeFactory;
    parent::__construct($context);

  }

  public function execute()
  {
    $post = (array)$this->_request->getPost();

    $resultRedirect = $this->resultRedirectFactory->create();

    $reviewCollection = $this->traineeFactory->create();
    $reviewCollection->setNama($post['nama']);
    $reviewCollection->setEmail($post['email']);
    $reviewCollection->setDivisi($post['divisi']);
    $reviewCollection->save();

    $resultRedirect->setPath('training/trainee/index');
    return $resultRedirect;
  }
}
