<?php
	namespace Icube\JNEResi\Helper;

	use \Magento\Framework\App\Helper\Context;
	use \Magento\Store\Model\ScopeInterface;

	class Config extends \Magento\Framework\App\Helper\AbstractHelper
	{
	//	public $jneurl;
		
	//	const url_awb = 'jne_setting/general/url_awb';
		const url_awb = 'jne_setting/general/url_awb';
		const api_key = 'jne_setting/general/api_key';
		const username = 'jne_setting/general/username';
		const port = 'jne_setting/general/port';
		const olshop_customer = 'jne_setting/general/olshop_customer';
		const olshop_region = 'jne_setting/general/olshop_region';
		const olshop_branch = 'jne_setting/general/olshop_branch';
		const shipper_city = 'jne_setting/general/olshop_shipper_city';
		const shipper_zip = 'jne_setting/general/olshop_shipper_zip';
		const shipper_phone = 'jne_setting/general/olshop_shipper_phone';
		const shipper_add1 = 'jne_setting/general/olshop_shipper_add1';
		const shipper_add2 = 'jne_setting/general/olshop_shipper_add2';
		const shipper_orig = 'jne_setting/general/olshop_shipper_orig';
		const shipper_name = 'jne_setting/general/olshop_shipper_name';

		public function __construct(Context $context)
		{
			parent::__construct($context);
		}

		public function getConfigValue()
		{
		//	return $this->scopeConfig->getValue(self::url_awb, ScopeInterface::SCOPE_STORE);
			$url_awb= $this->scopeConfig->getValue(self::url_awb, ScopeInterface::SCOPE_STORE);
			$api_key= $this->scopeConfig->getValue(self::api_key, ScopeInterface::SCOPE_STORE);
			$username= $this->scopeConfig->getValue(self::username, ScopeInterface::SCOPE_STORE);
			$port= $this->scopeConfig->getValue(self::port, ScopeInterface::SCOPE_STORE);
			$olshop_customer= $this->scopeConfig->getValue(self::olshop_customer, ScopeInterface::SCOPE_STORE);
			$olshop_region= $this->scopeConfig->getValue(self::olshop_region, ScopeInterface::SCOPE_STORE);
			$olshop_branch= $this->scopeConfig->getValue(self::olshop_branch, ScopeInterface::SCOPE_STORE);
			$shipper_city= $this->scopeConfig->getValue(self::shipper_city, ScopeInterface::SCOPE_STORE);
			$shipper_zip= $this->scopeConfig->getValue(self::shipper_zip, ScopeInterface::SCOPE_STORE);
			$shipper_phone= $this->scopeConfig->getValue(self::shipper_phone, ScopeInterface::SCOPE_STORE);
			$shipper_add1= $this->scopeConfig->getValue(self::shipper_add1, ScopeInterface::SCOPE_STORE);
			$shipper_add2= $this->scopeConfig->getValue(self::shipper_add2, ScopeInterface::SCOPE_STORE);
			$shipper_orig= $this->scopeConfig->getValue(self::shipper_orig, ScopeInterface::SCOPE_STORE);
			$shipper_name= $this->scopeConfig->getValue(self::shipper_name, ScopeInterface::SCOPE_STORE);

			$value = array(
							'url_awb' => $url_awb, 
							'api_key' => $api_key,
							'username' => $username,
							'port' => $port,
							'olshop_customer' => $olshop_customer,
							'olshop_region' => $olshop_region,
							'olshop_branch' => $olshop_branch,
							'shipper_city' => $shipper_city,
							'shipper_zip' => $shipper_zip, 
							'shipper_phone' => $shipper_phone,
							'shipper_add1' => $shipper_add1,
							'shipper_add2' => $shipper_add2,
							'shipper_orig' => $shipper_orig,
							'shipper_name' => $shipper_name);
			return $value;
		}
	}