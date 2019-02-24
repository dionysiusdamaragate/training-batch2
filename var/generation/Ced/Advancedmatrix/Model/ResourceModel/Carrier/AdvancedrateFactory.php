<?php
namespace Ced\Advancedmatrix\Model\ResourceModel\Carrier;

/**
 * Factory class for @see \Ced\Advancedmatrix\Model\ResourceModel\Carrier\Advancedrate
 */
class AdvancedrateFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Ced\\Advancedmatrix\\Model\\ResourceModel\\Carrier\\Advancedrate')
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param array $data
     * @return \Ced\Advancedmatrix\Model\ResourceModel\Carrier\Advancedrate
     */
    public function create(array $data = array())
    {
        return $this->_objectManager->create($this->_instanceName, $data);
    }
}
