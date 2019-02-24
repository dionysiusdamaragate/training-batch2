<?php
namespace Icube\JneResi\Model\ResourceModel;
class JneResi extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('jne_resi', 'id');
    }
     public function getAwb($orderId)
  {
        
        $where = $this->getConnection()->quoteInto("jne_resi.order_id = ?",$orderId);
        $sql = $this->getConnection()
                  ->select()
                  ->from('jne_resi',array('*'))
                  ->where($where);
        $data = $this->getConnection()->fetchRow($sql);
        return $data;
  }
}