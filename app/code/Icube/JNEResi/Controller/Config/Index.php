<?php
	namespace Icube\JNEResi\Controller\Config;

	use \Magento\Framework\App\Action\Action;
	use \Magento\Framework\App\Action\Context;
	use \Icube\JNEResi\Helper\Config;

	class Index extends Action
	{
		protected $helper;
		protected $_logger;

		public function __construct(
			Context $context,
			\Icube\JNEResi\Helper\Config $helper,
			\Psr\Log\LoggerInterface $logger
		){
			$this->helper = $helper;
			$this->_logger = $logger;
			parent::__construct($context);
		}

		public function execute()
		{
			//$this->_logger->info($api_key); 
			$value = $this->helper->getConfigValue();
		
			echo $value['url_awb']."</br>";
			echo $value['api_key']."</br>";
			echo $value['username']."</br>";
			echo $value['port']."</br>";
			echo $value['olshop_customer']."</br>";
			echo $value['olshop_region']."</br>";
			echo $value['olshop_branch']."</br>";
			echo $value['shipper_city']."</br>";
			echo $value['shipper_zip']."</br>";
			echo $value['shipper_phone']."</br>";
			echo $value['shipper_add1']."</br>";
			echo $value['shipper_add2']."</br>";
			echo $value['shipper_orig']."</br>";
			echo $value['shipper_name'];
		}
	}