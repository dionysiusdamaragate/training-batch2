<?php
	namespace Icube\Shanti\Block\Override;

	class Hello extends \Icube\Shanti\Block\Hello
	{
		public function getHelloWorld()
		{
			return 'Override Hello World Icube';
		}
	}
