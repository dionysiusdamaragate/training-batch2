<?php

namespace Icube\Training\Controller\Input;

//use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
//use Icube\Training\Model\TraineeFactory;
class Index extends \Magento\Framework\App\Action\Action
{
	// /**
    //  * @var Test
    //  */
    // protected $_test;

	// public function __construct(
	// 	Context $context,
    //     TraineeFactory $test
    // ) {
    //     $this->_test = $test;
    //     parent::__construct($context);
    // }
	public function execute()
    {   
        $post       = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            $name       = $post['name'];
            $email      = $post['email'];
            $division   = $post['division'];
            $id = $this->getRequest()->getParam('trainee_id');
            $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Magento\Framework\App\ResourceConnection');
            $connection= $this->_resources->getConnection();
            $themeTable = $this->_resources->getTableName('icube_training');
            $sql = "INSERT INTO ". $themeTable ." (trainee_id,name,email,division) VALUES ('','$name','$email','$division')";
            $connection->query($sql);
            $this->messageManager->addSuccessMessage(__('sukses'));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/input/trainee/index');
            return $resultRedirect;
    }
    $this->_view->loadLayout();
    $this->_view->renderLayout();
}
}