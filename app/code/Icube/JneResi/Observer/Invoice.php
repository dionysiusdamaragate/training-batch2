<?php
namespace Icube\JneResi\Observer;
use Magento\Framework\Event\ObserverInterface;
class Invoice implements ObserverInterface
{
	protected $_jneresi;
	const JNE = 'jne';
	 public function __construct(
        \Icube\JneResi\Model\JneResi $jneresi
    ){
        $this->_jneresi = $jneresi;
    }
	public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	$invoice = $observer->getEvent()->getInvoice();
        $order = $invoice->getOrder();
        if(strpos(strtolower($order->getShippingDescription()), self::JNE) !== false)
        {
        	$orderid = $order->getEntityId();
	        $invoiceDate = $invoice->getCreatedAt();
	        $queque = $this->_jneresi->create();
	        $queque->addData([
	          'order_id' => $orderid,
	          'invoice_date' => $invoiceDate
	          ])
	        ->save(); 
        }
    }
}
