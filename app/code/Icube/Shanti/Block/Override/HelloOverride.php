<?php
	namespace Icube\Shanti\Block\Override;

	class HelloOverride extends \Icube\Shanti\Block\Hello
	{
		public function getHelloWorld()
		{
			return 'Override Hello World Icube New';
		}
	}
