<?php
namespace Icube\Quiz\Model;

class Trainee extends \Magento\Framework\Model\AbstractModel implements TraineeInterface, \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'icube_training_trainee';

    protected function _construct()
    {
        $this->_init('Icube\Quiz\Model\ResourceModel\Trainee');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }   
}
