<?php
namespace Icube\JNEResi\Model\ResourceModel;

class Jne extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('JNE', 'id');
    }
}
