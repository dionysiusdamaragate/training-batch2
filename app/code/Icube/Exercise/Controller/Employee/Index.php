<?php
namespace Icube\Exercise\Controller\Employee;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Index extends Action
{
	protected $resultPageFactory;

	protected $_helper;

	public function __construct(
		Context $context, 
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Icube\Exercise\Helper\Config $helper
	)
	{
		$this->resultPageFactory = $resultPageFactory;
		$this->_helper = $helper;
		parent::__construct($context);
	}

	public function execute()
	{
		// echo $this->_helper->getConfigValue(); die();
		$resultPage = $this->resultPageFactory->create();
		return $resultPage;
	}
}