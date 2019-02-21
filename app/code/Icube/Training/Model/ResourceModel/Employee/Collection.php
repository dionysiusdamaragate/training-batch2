<?php
namespace Icube\Training\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Training\Model\Employee', 'Icube\Training\Model\ResourceModel\Employee');
	}
}
