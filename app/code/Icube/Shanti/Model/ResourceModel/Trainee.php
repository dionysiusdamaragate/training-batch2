<?php
namespace Icube\Shanti\Model\ResourceModel;

class Trainee extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('Icube_Employee', 'employee_id');
    }
}
