<?php
namespace Allin\Backinstock\Model;

class Backinstock extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Backinstock\Model\ResourceModel\Backinstock');
    }
}
?>