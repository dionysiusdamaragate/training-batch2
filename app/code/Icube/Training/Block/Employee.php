<?php
namespace Icube\Training\Block;
 
class Employee extends \Magento\Framework\View\Element\Template
{
	protected $employeeFactory;
	
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Icube\Training\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }
	
    public function getEmployeeName($id)
    {
	    $result = $this->employeeFactory->create();
		$result = $result->load($id);  
		return $result->getData('division');
    }
    
    public function getEmployeeCollection()
    {
	    $result = $this->employeeFactory->create();
		$collection = $result->getCollection();        
		return $collection;
    }  
}
