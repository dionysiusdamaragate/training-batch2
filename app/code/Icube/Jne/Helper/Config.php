<?php 
namespace Icube\Jne\Helper;

use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
	const awb = 'jne/general/url_awb';
	const api_key = 'jne/general/api_key';
	const username = 'jne/general/username';
	const olshop_customer = 'jne/general/olshop_customer';
	const olshop_region = 'jne/general/olshop_region';
	const olshop_branch = 'jne/general/olshop_branch';
	const port = 'jne/general/port';
	const olshop_shipper_city = 'jne/general/olshop_shipper_city';
	const olshop_shipper_zip = 'jne/general/olshop_shipper_zip';
	const olshop_shipper_phone = 'jne/general/olshop_shipper_phone';
	const olshop_shipper_add1 = 'jne/general/olshop_shipper_add1';
	const olshop_shipper_add2 = 'jne/general/olshop_shipper_add2';
	const olshop_shipper_orig = 'jne/general/olshop_shipper_orig';
	const olshop_shipper_name = 'jne/general/olshop_shipper_name';

	public function __construct(Context $context)
	{
		parent::__construct($context);
	}

	public function getConfigValue()
	{
		return array(
			'awb' => $this->scopeConfig->getValue(self::awb, ScopeInterface::SCOPE_STORE),
			'api_key' => $this->scopeConfig->getValue(self::api_key, ScopeInterface::SCOPE_STORE),
			'username' => $this->scopeConfig->getValue(self::username, ScopeInterface::SCOPE_STORE),
			'olshop_customer' => $this->scopeConfig->getValue(self::olshop_customer, ScopeInterface::SCOPE_STORE),
			'olshop_region' => $this->scopeConfig->getValue(self::olshop_region, ScopeInterface::SCOPE_STORE),
			'olshop_branch' => $this->scopeConfig->getValue(self::olshop_branch, ScopeInterface::SCOPE_STORE),
			'port' => $this->scopeConfig->getValue(self::port, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_city' => $this->scopeConfig->getValue(self::olshop_shipper_city, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_zip' => $this->scopeConfig->getValue(self::olshop_shipper_zip, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_phone' => $this->scopeConfig->getValue(self::olshop_shipper_phone, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_add1' => $this->scopeConfig->getValue(self::olshop_shipper_add1, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_add2' => $this->scopeConfig->getValue(self::olshop_shipper_add2, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_orig' => $this->scopeConfig->getValue(self::olshop_shipper_orig, ScopeInterface::SCOPE_STORE),
			'olshop_shipper_name' => $this->scopeConfig->getValue(self::olshop_shipper_name, ScopeInterface::SCOPE_STORE),
		);
	}
}