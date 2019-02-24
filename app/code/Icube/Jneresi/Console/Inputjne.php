<?php
namespace Icube\Jneresi\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Inputjne extends Command
{
   protected function configure()
   {
       $this->setName('input:jneresi');
       $this->setDescription('Insert Data JNE');
       
       parent::configure();
   }
   protected function execute(InputInterface $input, OutputInterface $output)
   {
       $output->writeln("Hello World");
   }
}
