<?php
namespace Icube\Quiz\Model\ResourceModel\Trainee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Quiz\Model\Trainee', 'Icube\Quiz\Model\ResourceModel\Trainee');
	}
}
