<?php
namespace Icube\Shanti\Model\ResourceModel\Trainee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Shanti\Model\Trainee', 'Icube\Shanti\Model\ResourceModel\Trainee');
	}
}
