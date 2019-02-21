<?php
namespace Icube\Training\Model\ResourceModel\Trainee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Training\Model\Trainee', 'Icube\Training\Model\ResourceModel\Trainee');
	}
}
