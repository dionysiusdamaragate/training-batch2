<?php
namespace Icube\Jneresi\Helper;

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

   public function __construct(Context $context)
   {
		parent::__construct($context);
   }
   public function getConfigValue()
   {
	$a = $this->scopeConfig->getValue(self::awb, ScopeInterface::SCOPE_STORE);
	$b = $this->scopeConfig->getValue(self::api_key, ScopeInterface::SCOPE_STORE);
	$result = array(
         	'awb' => $a,
         	'api_key' => $b
     	);
	return $result;
   }
}
