<?php
namespace Icube\Exercise\Model;

class Employee extends \Magento\Framework\Model\AbstractModel implements EmployeeInterface, \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = "icube_exercise_employee";

	protected function _construct()
	{
		$this->_init('Icube\Exercise\Model\ResourceModel\Employee');
	}

	public function getIdentities()
	{
		return [
			self::CACHE_TAG . '_' . $this->getId()
		];
	}
}