<?php
namespace Icube\Shanti\Block;
 
class Custom extends \Magento\Framework\View\Element\Template
{
    public function getDataForm()
    {

       // $_logger->info('My Log');

     //   return 'Hello world Icube!';

    	$data = $this->getData('form_data');
    	return $data;

    }
}