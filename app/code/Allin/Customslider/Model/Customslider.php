<?php
namespace Allin\Customslider\Model;

class Customslider extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Customslider\Model\ResourceModel\Customslider');
    }
}
?>