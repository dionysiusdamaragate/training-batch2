<?php
namespace Icube\Shanti\Model;

class Trainee extends \Magento\Framework\Model\AbstractModel implements TraineeInterface, \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'icube_shanti_trainee';

    protected function _construct()
    {
        $this->_init('Icube\Shanti\Model\ResourceModel\Trainee');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }   
}
