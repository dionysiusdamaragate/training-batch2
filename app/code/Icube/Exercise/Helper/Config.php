<?php 
namespace Icube\Exercise\Helper;

use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
	const XML_PATH = 'training_setting/general/rand_number';

	public function __construct(Context $context)
	{
		parent::__construct($context);
	}

	public function getConfigValue()
	{
		return $this->scopeConfig->getValue(self::XML_PATH, ScopeInterface::SCOPE_STORE);
	}
}