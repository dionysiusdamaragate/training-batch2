<?php

namespace Icube\Training\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo "Customer LoggedIn";
        $customer = $observer->getEvent()->getCustomer();
        $test = $customer->getName();

 	    $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/testing.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info($test);
    }
}
