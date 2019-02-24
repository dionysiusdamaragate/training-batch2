<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Backend grid item renderer
 *
 * @author     Icube>
 */
namespace Ced\Advancedmatrix\Block\Adminhtml\Carrier\Advancedrate\Renderer;

class City extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    public function _getValue(\Magento\Framework\DataObject $row)
    {
        // echo $row->getData($this->getColumn()->getIndex()).'<br>';
        // die();

        return $row->getData($this->getColumn()->getIndex());
    }
}
