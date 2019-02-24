<?php
namespace Icube\Jne\Model;

class Resi extends \Magento\Framework\Model\AbstractModel implements ResiInterface, \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = "icube_jne_resi";

	protected function _construct()
	{
		$this->_init('Icube\Jne\Model\ResourceModel\Resi');
	}

	public function getIdentities()
	{
		return [
			self::CACHE_TAG . '_' . $this->getId()
		];
	}
}