<?php 

namespace Icube\Shanti\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Icube\Shanti\Helper\Data;

class Helper extends Action
{
	protected $helper;
	
	public function __construct(
		Context $context,
        \Icube\Shanti\Helper\Data $helper
	){
		$this->helper = $helper;
		parent::__construct($context);

	}
	public function execute()
	{
		$this->helper->getTrainingHelper();
	}
}
