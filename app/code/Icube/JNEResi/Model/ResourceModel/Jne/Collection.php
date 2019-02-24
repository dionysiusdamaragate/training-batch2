<?php
namespace Icube\JNEResi\Model\ResourceModel\Jne;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\JNEResi\Model\Jne', 'Icube\JNEResi\Model\ResourceModel\Jne');
	}
}
