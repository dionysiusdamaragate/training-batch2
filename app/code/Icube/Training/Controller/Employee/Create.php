<?php 

namespace Icube\Training\Controller\Employee;

use \Magento\Framework\App\Action\Action;

class Create extends Action
{
    public function execute()
    {
        $post       = (array) $this->getRequest()->getPost();
        $email      = $post['email'];
        $division   = $post['division'];

        $id = $this->getRequest()->getParam('id_employee');
        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Magento\Framework\App\ResourceConnection');
            $connection= $this->_resources->getConnection();
            $themeTable = $this->_resources->getTableName('icube_employee');
       $sql = "INSERT INTO $themeTable (email,division) VALUES ('$email','$division')";
       $connection->query($sql);
       $this->_redirect('training/employee/index');
    }
}