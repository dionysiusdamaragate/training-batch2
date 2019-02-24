<?php
namespace Icube\Jne\Controller\Config;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Icube\Jne\Helper\Config;

class Index extends Action
{
	protected $helper;

	public function __construct(Context $context, \Icube\Jne\Helper\Config $helper)
	{
		$this->helper = $helper;
		parent::__construct($context);
	}

	public function execute()
	{
		var_dump($this->helper->getConfigValue());
	}
}