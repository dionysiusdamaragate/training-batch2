<?php

namespace Icube\Jneresi\Controller\Config;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Icube\Jneresi\Helper\Config;

class Index extends Action
{
	protected $helper;

	public function __construct(
		Context $context,
        \Icube\Jneresi\Helper\Config $helper
	){
		$this->helper = $helper;
		parent::__construct($context);

	}
	public function execute()
	{
		$result = $this->helper->getConfigValue();
		echo $result['awb'].'<br>';
		echo $result['api_key'];
	}
}
