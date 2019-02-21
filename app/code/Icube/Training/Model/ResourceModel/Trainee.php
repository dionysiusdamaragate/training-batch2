<?php
namespace Icube\Training\Model\ResourceModel;

class Trainee extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('icube_training', 'trainee_id');
    }
}