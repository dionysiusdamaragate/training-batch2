<?php
namespace Icube\Training\Model\ResourceModel;

class Employee extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('icube_employee', 'id_employee');
    }
}
