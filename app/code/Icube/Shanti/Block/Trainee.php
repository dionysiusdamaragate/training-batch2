<?php
namespace Icube\Shanti\Block;
 
class Trainee extends \Magento\Framework\View\Element\Template
{
	protected $traineeFactory;
	
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Icube\Shanti\Model\TraineeFactory $traineeFactory
    )
    {
        $this->traineeFactory = $traineeFactory;
        parent::__construct($context);
    }
	
    public function getTraineeName($id)
    {
	    $result = $this->traineeFactory->create();
		$result = $result->load($id);  
		return $result->getData('nama');
    }
    
    public function getTraineeCollection()
    {
	    $result = $this->traineeFactory->create();
		$collection = $result->getCollection();        
		return $collection;
    }  
}