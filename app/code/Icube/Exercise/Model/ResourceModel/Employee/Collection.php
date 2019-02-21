<?php
namespace Icube\Exercise\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Exercise\Model\Employee', 'Icube\Exercise\Model\ResourceModel\Employee');
	}
}