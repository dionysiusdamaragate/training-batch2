<?php

namespace Icube\Exercise\Controller\Employee;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Insert extends Action
{
   protected $_helper;

   public function __construct(
    Context $context,
    \Icube\Exercise\Helper\Config $helper
  )
  {
    $this->_helper = $helper;
    parent::__construct($context);
  }

   public function execute()
   {
       $post       = (array) $this->getRequest()->getPost();
       $name       = $post['name'];
       $email      = $post['email'];
       $division   = $post['division'];
       $status     = $this->_helper->getConfigValue();

       $id = $this->getRequest()->getParam('id');
       $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
           ->get('Magento\Framework\App\ResourceConnection');
      $connection= $this->_resources->getConnection();
      $themeTable = $this->_resources->getTableName('icube_employee');
      $sql = "INSERT INTO $themeTable (name, email, division, status) VALUES ('$name', '$email', '$division', '$status')";
      $connection->query($sql);
      $this->_redirect('exercise/employee');
   }
}