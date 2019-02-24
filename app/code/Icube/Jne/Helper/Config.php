<?php
namespace Icube\Jne\Helper;

use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
   const url_awb = 'jne/general/url_awb';
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
   
   //ganti nama function dan XAML_PATHnya
   public function getConfigUrl_awb()
   {
       return $this->scopeConfig->getValue(self::url_awb, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigApi_key()
   {
       return $this->scopeConfig->getValue(self::api_key, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigUsername()
   {
       return $this->scopeConfig->getValue(self::username, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_customer()
   {
       return $this->scopeConfig->getValue(self::olshop_customer, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_region()
   {
       return $this->scopeConfig->getValue(self::olshop_region, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_branch()
   {
       return $this->scopeConfig->getValue(self::olshop_branch, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigPort()
   {
       return $this->scopeConfig->getValue(self::port, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_city()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_city, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_zip()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_zip, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_phone()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_phone, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_add1()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_add1, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_add2()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_add2, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_orig()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_orig, ScopeInterface::SCOPE_STORE);
   }

   public function getConfigOlshop_shipper_name()
   {
       return $this->scopeConfig->getValue(self::olshop_shipper_name, ScopeInterface::SCOPE_STORE);
   }
}
/*public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig) {
        $this->_scopeConfig = $scopeConfig;
    }*/