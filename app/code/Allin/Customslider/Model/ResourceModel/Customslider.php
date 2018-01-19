<?php
namespace Allin\Customslider\Model\ResourceModel;

class Customslider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('customslider', 'customslider_id');
    }
}
?>