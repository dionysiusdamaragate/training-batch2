<?php
namespace Icube\Exercise\Block\Override;

class HelloBlock extends \Icube\Exercise\Block\HelloBlock
{
	public function helloWorlds()
	{
		return "Override hello world";
	}
}