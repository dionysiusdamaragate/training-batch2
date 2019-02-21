<?php
namespace Icube\Magento2Module\Controller\Trainee;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Delete extends Action
{
	protected $resultPageFactory;

	public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
	{
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

	public function execute()
	{
		$data =  "<script>alert('sukses')</script>";
		if ($data == true) {
			$this->_redirect('magento2/trainee');
		} else {
			var_dump('error'); die();
		}
		
	}
}