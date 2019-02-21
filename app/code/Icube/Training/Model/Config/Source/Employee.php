<?php

namespace Icube\Training\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Employee implements ArrayInterface
{

public function toOptionArray()
{
    $arr = $this->toArray();
    $ret = [];
    foreach ($arr as $key => $value) {
        $ret[] = [
            'value' => $key,
            'label' => $value
        ];
    }
    return $ret;
}

public function toArray()
{
    $choose = [
        '1' => 'Employee',
        '0' => 'Unemployee',
    ];
    return $choose;
}
}
