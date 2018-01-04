<?php
namespace Allin\Backinstock\Block\Adminhtml\Backinstock\Edit;

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
        $this->setId('backinstock_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Backinstock Information'));
    }
}