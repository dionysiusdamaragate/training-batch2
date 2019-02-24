<?php
namespace Icube\Jne\Model\ResourceModel;

class Resi extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('icube_jne', 'id');
	}
}