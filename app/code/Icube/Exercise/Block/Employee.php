<?php
namespace Icube\Exercise\Block;

class Employee extends \Magento\Framework\View\Element\Template
{
	protected $employeeFactory;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Icube\Exercise\Model\EmployeeFactory $employeeFactory
	)
	{
		$this->employeeFactory = $employeeFactory;
		parent::__construct($context);
	}

	public function getEmployeeName($id)
	{
		$result = $this->employeeFactory->create();
		$result = $result->load($id);
		return $result->getData('name');
	}

	public function getEMployeeCollection()
	{
		$result = $this->employeeFactory->create();
		$collection = $result->getCollection();
		return $collection;
	}
}