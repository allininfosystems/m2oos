<?php
namespace Allin\Backinstock\Model\ResourceModel;

class Backinstock extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('backinstock', 'backinstock_id');
    }
}
?>