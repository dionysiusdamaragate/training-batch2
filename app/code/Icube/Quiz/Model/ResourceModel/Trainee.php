<?php
namespace Icube\Quiz\Model\ResourceModel;

class Trainee extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ICUBE_EMPLOYEE', 'entity_id');
    }
}
