<?php

namespace Allin\Backinstock\Model\ResourceModel\Backinstock;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Backinstock\Model\Backinstock', 'Allin\Backinstock\Model\ResourceModel\Backinstock');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>