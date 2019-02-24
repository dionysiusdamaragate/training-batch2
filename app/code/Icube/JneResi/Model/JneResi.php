<?php
namespace Icube\JneResi\Model;
use Magento\Framework\Model\AbstractModel;

class JneResi extends AbstractModel
{
    protected function _construct() {
        $this->_init('Icube\JneResi\Model\ResourceModel\JneResi');
    }
     public function getAwb($orderId)
  {
        $data = $this->getResource()->getAwb($orderId);
        $result = '';
        if($data){
	        if($data['no_resi'] != 'error')
	        	if($data['no_resi'] != 'processing'){
	        		$result = $data['no_resi'];
	        	}
	        }
        return $result;
  }
}