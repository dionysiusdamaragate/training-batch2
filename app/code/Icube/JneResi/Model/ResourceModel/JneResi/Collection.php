<?php
namespace Icube\JneResi\Model\ResourceModel\JneResi;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct() {
        $this->_init(
        	'Icube\JneResi\Model\JneResi',
        	'Icube\JneResi\Model\ResourceModel\JneResi'
        	);
    }
}