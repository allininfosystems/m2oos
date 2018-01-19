<?php
namespace Allin\Customslider\Block\Adminhtml\Customslider\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('customslider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Customslider Information'));
    }
}