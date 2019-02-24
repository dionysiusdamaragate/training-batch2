<?php
namespace Icube\JNEResi\Model;

class Jne extends \Magento\Framework\Model\AbstractModel implements JneInterface, \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'icube_jneresi_jne';

    protected function _construct()
    {
        $this->_init('Icube\JNEResi\Model\ResourceModel\Jne');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }   
}
