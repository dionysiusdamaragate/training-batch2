<?php
namespace Icube\Shanti\Block;
 
class Hello extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorld()
    {

       // $_logger->info('My Log');

        return 'Hello world Icube!';

    }
}