<?php
namespace Icube\Jne\Model\ResourceModel\Resi;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Icube\Jne\Model\Resi', 'Icube\Jne\Model\ResourceModel\Resi');
	}
}