<?php
namespace Icube\Shanti\Helper;

use \Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
   public function getTrainingHelper()
   {
        echo 'This is Helper in Training Module';
   }
}