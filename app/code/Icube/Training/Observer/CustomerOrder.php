<?php

namespace Icube\Training\Observer;

use Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\App\Action\Context;

class CustomerOrder implements ObserverInterface
{

	protected $_customerFactory;
	
	public function __construct(
		Context $context,
        \Magento\Customer\Model\CustomerFactory $_customerFactory
	){
		$this->_customerFactory= $_customerFactory;
		parent::__construct($context);
	}

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
            $event = $observer->getEvent()->getOrder();
 	    $customerId = $event->getCustomerId();
 	    $customer = $this->_customerFactory->create()->load($customerId);

 	    $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/testing.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info($customer->getEmail());
    }
}
