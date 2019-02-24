<?php
namespace Icube\Jne\Controller\Resi;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Index extends Action
{
	protected $resiFactory;

	public function __construct(Context $context, \Icube\Jne\Model\ResiFactory $resiFactory)
	{
		$this->resiFactory = $resiFactory;
		parent::__construct($context);
	}

	public function getResiName($id)
	{
		$result = $this->resiFactory->create();
		$result = $result->load($id);
		return $result->getData('name');
	}

	public function getResiCollection()
	{
		$result = $this->resiFactory->create();
		$collection = $result->getCollection();
		return $collection;
	}

	public function execute()
	{
		foreach ($this->getResiCollection() as $resi) {
			var_dump(array(
				'id' => $resi->getId(),
				'order_id' => $resi->getOrder_id(),
				'shipment_id' => $resi->getShipment_id(),
				'no_resi' => $resi->getNo_resi(),
				'shipment_date' => $resi->getShipment_date(),
				'invoice_date' => $resi->getInvoice_date(),
				'comment' => $resi->getComment(),
				'status' => $resi->getStatus()
			));
		}
	}
}