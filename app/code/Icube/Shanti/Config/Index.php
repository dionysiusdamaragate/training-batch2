<?php
	namespace Icube\Shanti\Controller\Config;

	use \Magento\Framework\App\Action\Action;
	use \Magento\Framework\App\Action\Context;
	use \Icube\Shanti\Helper\Config;

	class Index extends Action
	{
		protected $helper;

		public function __construct(
			Context $context,
			\Icube\Shanti\Helper\Config $helper
		){
			$this->helper = $helper;
			parent::__construct($context);
		}

		public function execute()
		{
			echo $this->helper->getConfigValue();
		}
	}