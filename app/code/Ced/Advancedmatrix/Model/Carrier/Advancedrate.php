<?php
/**
 * CedCommerce
  *
  * NOTICE OF LICENSE
  *
  * This source file is subject to the End User License Agreement (EULA)
  * that is bundled with this package in the file LICENSE.txt.
  * It is also available through the world-wide-web at this URL:
  * http://cedcommerce.com/license-agreement.txt
  *
  * @category    Ced
  * @package     Ced_Advancedmatrix
  * @author       CedCommerce Core Team <connect@cedcommerce.com >
  * @copyright   Copyright CEDCOMMERCE (http://cedcommerce.com/)
  * @license      http://cedcommerce.com/license-agreement.txt
  */
namespace Ced\Advancedmatrix\Model\Carrier;

use Magento\Framework\Exception\LocalizedException;
use Magento\Quote\Model\Quote\Address\RateRequest;

class Advancedrate extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{

    protected $_code = 'advancedmatrix';

    protected $_isFixed = true;

    protected $_defaultConditionName = 'package_weight';

    protected $_conditionNames = [];

    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $_rateResultFactory;

    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $_rateMethodFactory;

    /**
     * @var \Ced\Advancedmatrix\Model\Resource\Carrier\AdvancedrateFactory
     */
    protected $_tablerateFactory;


    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        \Ced\Advancedmatrix\Model\ResourceModel\Carrier\AdvancedrateFactory $tablerateFactory,
        array $data = []
    ) {
    	$this->_scopeConfig = $scopeConfig;
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        $this->_tablerateFactory = $tablerateFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);

     }

    /**
     * @param RateRequest $request
     * @return \Magento\Shipping\Model\Rate\Result
     */
    public function collectRates(RateRequest $request)
    {
    	
        $oldValue = $request->getPackageValue();
        $oldWeight = $request->getPackageWeight();
        $oldQty = $request->getPackageQty();
        $freeQty = 0;
        // exclude Virtual products price from Package value if pre-configured
        $DG = 0;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        if (!$this->getConfigFlag('use_virtual_product') && $request->getAllItems()) {
        	
            foreach ($request->getAllItems() as $item) {
                if ($item->getParentItem()) {
                    continue;
                }

                $_product = $objectManager->get('Magento\Catalog\Model\Product')->load($item->getProduct()->getId());  
                $_DG = $_product->getData('delivery_goods_type');

              
                if ($_DG==2) {
                    $DG = 1;
                }
				
                if ($item->getHasChildren() && $item->isShipSeparately()) {
                	
                    foreach ($item->getChildren() as $child) {
                        if ($child->getProduct()->isVirtual()) {
                            $request->setPackageValue($request->getPackageValue() - $child->getBaseRowTotal());
                        }
                    }
                } elseif ($item->getProduct()->getTypeId() == 'virtual') {
                	
                    $request->setPackageValue($request->getPackageValue() - $item->getBaseRowTotal());
                }
            }
        }

        $request->setDangerousGood($DG);
		 // exclude Downloadable products price from Package value if pre-configured
        if (!$this->getConfigFlag('use_download_product') && $request->getAllItems()) {
        	
            foreach ($request->getAllItems() as $item) {
                if ($item->getParentItem()) {
                    continue;
                }
                
                
                if ($item->getHasChildren() && $item->isShipSeparately()) {
                    foreach ($item->getChildren() as $child) {
                    	
                    	//return($child->getProduct());die;
                    	
                    	
                        if ($child->getProduct()->getTypeId()=='downloadable') {
                        	
                            $request->setPackageValue($request->getPackageValue() - $child->getBaseRowTotal());
                        }
                    }
                } elseif ($item->getProduct()->getTypeId()=='downloadable') {
                	
                    $request->setPackageValue($request->getPackageValue() - $item->getBaseRowTotal());
                }
            }
           
        }

        // Free shipping by qty
         $freeQty = 0;
        if ($request->getAllItems()) {
            $freePackageValue = 0;
            foreach ($request->getAllItems() as $item) {
                if ($item->getProduct()->isVirtual() || $item->getParentItem()) {
                    continue;
                }

                if ($item->getHasChildren() && $item->isShipSeparately()) {
                    foreach ($item->getChildren() as $child) {
                        if ($child->getFreeShipping() && !$child->getProduct()->isVirtual()) {
                            $freeShipping = is_numeric($child->getFreeShipping()) ? $child->getFreeShipping() : 0;
                            $freeQty += $item->getQty() * ($child->getQty() - $freeShipping);
                        }
                    }
                } elseif ($item->getFreeShipping()) {
                    $freeShipping = is_numeric($item->getFreeShipping()) ? $item->getFreeShipping() : 0;
                    $freeQty += $item->getQty() - $freeShipping;
                    $freePackageValue += $item->getBaseRowTotal();
                }
            }
            
            $oldValue = $request->getPackageValue();
           
            $request->setPackageValue($oldValue - $freePackageValue);
        }
       
        
        $result = $this->_rateResultFactory->create();
       
        $rates = $this->getdefaultRate($request);

       /* Icube Update - Original Code Free Shipping */
/*
        if ($this->_scopeConfig->getValue('carriers/advancedmatrix/free_shipping', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) && 
        		($request->getFreeShipping() === true || 
        		($request->getPackageValue() >= $this->_scopeConfig->getValue('carriers/advancedmatrix/min_freeshipping_amount', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) && 
        		$request->getPackageWeight() <= $this->_scopeConfig->getValue('carriers/advancedmatrix/max_freeshipping_weight', \Magento\Store\Model\ScopeInterface::SCOPE_STORE))))
          {
        	
        	$method = $this->_rateMethodFactory->create();
        	$method->setCarrier($this->_code);
        	$method->setCarrierTitle("Premium Matrix");
        	$method->setMethod('matrix_free');
        	$method->setMethodTitle('Free Shipping');
        	$method->setPrice('0.00');
        	$method->setCost('0.00');
        	$result->append($method);
        	
        }
*/
        
        
        if (!empty($rates)) {
        	$count=0;
        	foreach ($rates as $rate)
        	{
        		if (!empty($rate) && $rate['price'] >= 0) {
        			$method = $this->_rateMethodFactory->create();
        
        			$method->setCarrier($this->_code);
        			$method->setCarrierTitle($this->getConfigData('title'));
        			$method->setMethod('advancedmatrix'.$count++);
        			$method->setMethodTitle($rate['label']);
        			/* Icube Update - Check wheter get Free Shipping Yes => set price into 0 */
        			if ($this->_scopeConfig->getValue('carriers/advancedmatrix/free_shipping', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) && 
        		($request->getFreeShipping() === true || 
        		($request->getPackageValue() >= $this->_scopeConfig->getValue('carriers/advancedmatrix/min_freeshipping_amount', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) && 
        		$request->getPackageWeight() <= $this->_scopeConfig->getValue('carriers/advancedmatrix/max_freeshipping_weight', \Magento\Store\Model\ScopeInterface::SCOPE_STORE))))
					{
						$method->setPrice('0.00');
						$method->setCost('0.00');
        			}
        			else
        			{
	        			/* Icube Update - Original Code */        			
        				$method->setCost($rate['price']);
						$method->setPrice($rate['price']);
        			}
                    $method->setMethodDescription($rate['etd']);
        			$result->append($method);
        		}
        	}
        		
        }        
        else {
        	/** @var \Magento\Quote\Model\Quote\Address\RateResult\Error $error */
        	$error = $this->_rateErrorFactory->create(
        			[
        			'data' => [
        			'carrier' => $this->_code,
        			'carrier_title' => $this->getConfigData('title'),
        			'error_message' => $this->getConfigData('specificerrmsg'),
        			],
        			]
        	);
        	$result->append($error);
        }
        
     
        return $result;
    }

    /**
     * @param \Magento\Quote\Model\Quote\Address\RateRequest $request
     * @return array|bool
     */
    public function getdefaultRate(\Magento\Quote\Model\Quote\Address\RateRequest $request)
    {
        return $this->_tablerateFactory->create()->getRates($request);
    }

    /**
     * @param string $type
     * @param string $code
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    /* public function getCode($type, $code = '')
    {
        $codes = [
            'condition_name' => [
                'package_weight' => __('Weight vs. Destination'),
                'package_value' => __('Price vs. Destination'),
                'package_qty' => __('# of Items vs. Destination'),
            ],
            'condition_name_short' => [
                'package_weight' => __('Weight (and above)'),
                'package_value' => __('Order Subtotal (and above)'),
                'package_qty' => __('# of Items (and above)'),
            ],
        ];

        if (!isset($codes[$type])) {
            throw new LocalizedException(__('Please correct Table Rate code type: %1.', $type));
        }

        if ('' === $code) {
            return $codes[$type];
        }

        if (!isset($codes[$type][$code])) {
            throw new LocalizedException(__('Please correct Table Rate code for type %1: %2.', $type, $code));
        }

        return $codes[$type][$code];
    } */

    /**
     * Get allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
      return [$this->_code=> $this->getConfigData('name')];
    }
}