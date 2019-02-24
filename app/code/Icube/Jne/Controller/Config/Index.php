<?php 

namespace Icube\Training\Controller\Config;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Icube\Jne\Helper\Config;

class Index extends Action
{
	protected $helper;
	protected $_logger;

	public function __construct(
		Context $context,
	\Magento\Backend\Block\Template\Context $context,
	\Psr\Log\LoggerInterface $logger,
        \Icube\Jne\Helper\Config $helper
	){
		$this->_logger = $logger;
		$this->helper = $helper;
		parent::__construct($context);

	}
	public function execute()
	{
	 	return	$this->_logger->info($this->helper->getConfigValue();
	}
}
