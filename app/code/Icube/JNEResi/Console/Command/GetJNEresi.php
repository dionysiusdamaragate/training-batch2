<?php
namespace Icube\JNEResi\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetJNEResi extends Command
{
    protected function configure()
    {
        $this->setName('icube:jneresi:getjneresi')
            ->setDescription('Get JNE Resi');
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {   
        $om = \Magento\Framework\App\ObjectManager::getInstance();
        $om->get('Magento\Framework\App\State')->setAreaCode('adminhtml');
        $helper = $om->get('\Icube\JNEResi\Helper\Config');
        $helper->getConfigValue();
       
    }
   
    
}