<?php
namespace Icube\JneResi\Helper;
class Awb
{
    
    protected $_jneresi;
    protected $_orderFactory;
    protected $_modelCityFactory;

	public function __construct(
		
       
        \Icube\JneResi\Model\JneResi $jneresi,
        \Magento\Sales\Model\Order $orderFactory,
        \Icube\City\Model\CityFactory $modelCityFactory,
        \Magento\Framework\App\Helper\Context $context
	)
	{
		
       
        $this->_jneresi = $jneresi;
        $this->_orderFactory = $orderFactory;
        $this->_modelCityFactory = $modelCityFactory;
        $this->_scopeConfig = $context->getScopeConfig();
	} 
	public function CallJNEAPI()
	{
		$resi = $this->_jneresi->create()->getCollection();
        $resi->addFieldToFilter('no_resi',['null'=>true])->setPageSize(10)->setCurPage(1);;
        $resi->load();
        foreach ($resi as $q) 
        {
          $q->setData([
            'id'=> $q->getId(),
            'order_id'=> $q->getOrderId(),
            'invoice_date'=> $q->getInvoiceDate(),
            'no_resi'=> 'processing'
        ])
        ->save();   
        }
        
        foreach ($resi as $q) 
        {             
            $order = $this->_orderFactory->load($q->getOrderId());
            $customername= $order->getCustomerName();
            $customerid= $order->getEntityId();
            $orderid= $order->getIncrementId();
            $item = $order->getAllVisibleItems();
           
            foreach ($item as $i ) {
              $qty= $i->getQtyOrdered();
              $weight = number_format($i->getWeight(), 1, '.', '');
              $weight = $weight/1000;
              $weight = ceil($weight);
              $price= $i->getPrice();
            }
           
            $shippingAddress = $order->getShippingAddress();
            $city = $shippingAddress->getCity();
            $cities = explode('/',$city,2);
            $city1 = $cities[0];
            $kecamatan = $cities[1];
             $cityModel = $this->_modelCityFactory->create();
             $kecamatanlist = $cityModel->getCollection()
                             ->addFieldToFilter('city',['eq' => $city1])
                            ->addFieldToFilter('kecamatan',['eq' => $kecamatan])
                            ->getFirstItem();
              $dest = $kecamatanlist->getKecamatanCode();
              $dest = substr($dest,0,8);
            $street = $shippingAddress->getStreet();
            $street1="";
            foreach ($street as $s) {
              $street1 .= $s." ";
            }
            $street = str_split($street1,30);
            
            $region =$shippingAddress->getRegion();
            $phone =$shippingAddress->getTelephone();
            $zip =$shippingAddress->getPostCode();
            $shippingName = $shippingAddress->getFirstname() . " " . $shippingAddress->getLastname();
            
            $url = $this->_scopeConfig->getValue('jne/general/url_awb', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $port= $this->_scopeConfig->getValue('jne/general/port', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $username= $this->_scopeConfig->getValue('jne/general/username', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $olshop_cust = $this->_scopeConfig->getValue('olshop_customer', \Magento\Store\Model\ScopeInterface::SCOPE_STORE); //todo : create config
            $api_key= $this->_scopeConfig->getValue('api_key', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_branch= $this->_scopeConfig->getValue('olshop_branch', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_name= $this->_scopeConfig->getValue('olshop_shipper_name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_address= $this->_scopeConfig->getValue('olshop_shipper_add1', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_address_two= $this->_scopeConfig->getValue('olshop_shipper_add2', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_zip= $this->_scopeConfig->getValue('olshop_shipper_zip', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_city= $this->_scopeConfig->getValue('olshop_shipper_city', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_region= $this->_scopeConfig->getValue('olshop_region', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_phone= $this->_scopeConfig->getValue('olshop_shipper_phone', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $shipper_orig= $this->_scopeConfig->getValue('olshop_shipper_orig', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

            $formdata = array();
            $formdata['username'] = $username;
            $formdata['api_key'] = $api_key;
            $formdata['OLSHOP_BRANCH'] = $shipper_branch;
            $formdata['OLSHOP_CUST'] = $olshop_cust;
            $formdata['OLSHOP_ORIG'] = $shipper_orig;
            $formdata['OLSHOP_ORDERID'] = $orderid;
            $formdata['OLSHOP_SHIPPER_NAME'] = $shipper_name;
            $formdata['OLSHOP_SHIPPER_ADDR1'] = $shipper_address;
            $formdata['OLSHOP_SHIPPER_ADDR2'] = $shipper_address_two;
            $formdata['OLSHOP_SHIPPER_CITY'] = $shipper_city;
            $formdata['OLSHOP_SHIPPER_ZIP'] = $shipper_zip;
            $formdata['OLSHOP_SHIPPER_PHONE'] = $shipper_phone;
            $formdata['OLSHOP_RECEIVER_NAME'] = $shippingName;
            $formdata['OLSHOP_RECEIVER_ADDR1'] = $street[0];
            $formdata['OLSHOP_RECEIVER_ADDR2'] = isset($street[1]) ? $street[1] : '';
            $formdata['OLSHOP_RECEIVER_ADDR3'] = isset($street[2]) ? $street[2] : '';
            $formdata['OLSHOP_RECEIVER_CITY'] = $city1;
            $formdata['OLSHOP_RECEIVER_ZIP'] = $zip;
            $formdata['OLSHOP_RECEIVER_PHONE'] = preg_replace("/[^0-9]/","",$phone);
            $formdata['OLSHOP_DEST'] = $dest;
            $formdata['OLSHOP_SERVICE'] = 'OKE';
            $formdata['OLSHOP_QTY'] = $qty;
            $formdata['OLSHOP_WEIGHT'] = $weight;
            $formdata['OLSHOP_GOODSTYPE'] = '2';
            $formdata['OLSHOP_GOODSDESC'] = 'desc';
            $formdata['OLSHOP_GOODSVALUE'] = $price;
            $formdata['OLSHOP_INS_FLAG'] = 'N';
            $fieldsString =  str_replace('+', ' ', http_build_query($formdata));
            
            $url = 'http://apiv2.jne.co.id:10102/tracing/api/generatecnote';
            $curl = curl_init($url);
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $fieldsString,
                CURLOPT_HTTPHEADER => array(
                      'Content-Type'=> 'application/x-www-form-urlencoded'
                ),
            ));
            
            $response = curl_exec($curl);
            
            $err = curl_error($curl);
            curl_close($curl);
            $result = json_decode($response);
             
            if ($err) {
             
                $q->setData([
                    'id'=> $q->getId(),
                    'order_id'=> $q->getOrderId(),
                    'invoice_date'=> $q->getInvoiceDate(),
                    'no_resi'=> NULL
                ])
                ->save();   
            } else {
                try{
                    
                    $result = (array)$result;
                    $result = $result['detail'][0];
                    $result = (array)$result;
                    $status = (string)$result['status'];
                    
                    if($status == "sukses")
                    {
                        $cnote_no = (string)$result['cnote_no'];
                        
                        $q->setData([
                                    'id'=> $q->getId(),
                                    'order_id'=> $q->getOrderId(),
                                    'invoice_date'=> $q->getInvoiceDate(),
                                    'no_resi'=> $cnote_no,
                                    'comment' => 'Create Awb Success'
                                ])
                                ->save(); 
                    }
                    elseif ($status == "Error") {
                        $reason = (string)$result['reason'];
                       
                        if(array_key_exists('reason', $result))
                        {
                            $q->setData([
                                    'id'=> $q->getId(),
                                    'order_id'=> $q->getOrderId(),
                                    'invoice_date'=> $q->getInvoiceDate(),
                                    'no_resi'=> NULL,
                                    'comment' => (string)$result['reason'],
                                    'status' => 'fail'
                                ])
                            ->save(); 
                        }
                    }else
                    {
                        
                        $this->setResiNull($q);
                    }
                }catch (\Exception $e){
                  
                    $this->setResiNull($q);
                }
            
            }
        }
	}
	private function setResiNull(\Icube\JneResi\Model\JneResi $jneresi)
    {
        $jneresi->setData([
                    'id'=> $jneresi->getId(),
                    'order_id'=> $jneresi->getOrderId(),
                    'invoice_date'=> $jneresi->getInvoiceDate(),
                    'no_resi'=> NULL,
                    'comment' => 'resi null',
                    'status' => 'fail'
                ])
        ->save();   
    }
}