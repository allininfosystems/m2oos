<?php
namespace Allin\Customslider\Block\Adminhtml\Customslider;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\Customslider\Model\customsliderFactory
     */
    protected $_customsliderFactory;

    /**
     * @var \Allin\Customslider\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\Customslider\Model\customsliderFactory $customsliderFactory
     * @param \Allin\Customslider\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\Customslider\Model\CustomsliderFactory $CustomsliderFactory,
        \Allin\Customslider\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_customsliderFactory = $CustomsliderFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('customslider_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_customsliderFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'customslider_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'customslider_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );


		
				$this->addColumn(
					'title',
					[
						'header' => __('Title'),
						'index' => 'title',
					]
				);
				
						
						$this->addColumn(
							'customergroup',
							[
								'header' => __('Customergroup'),
								'index' => 'customergroup',
								'type' => 'options',
								'options' => \Allin\Customslider\Block\Adminhtml\Customslider\Grid::getOptionArray2()
							]
						);
						
						
						
						$this->addColumn(
							'status',
							[
								'header' => __('Status'),
								'index' => 'status',
								'type' => 'options',
								'options' => \Allin\Customslider\Block\Adminhtml\Customslider\Grid::getOptionArray3()
							]
						);
						
						


		
        //$this->addColumn(
            //'edit',
            //[
                //'header' => __('Edit'),
                //'type' => 'action',
                //'getter' => 'getId',
                //'actions' => [
                    //[
                        //'caption' => __('Edit'),
                        //'url' => [
                            //'base' => '*/*/edit'
                        //],
                        //'field' => 'customslider_id'
                    //]
                //],
                //'filter' => false,
                //'sortable' => false,
                //'index' => 'stores',
                //'header_css_class' => 'col-action',
                //'column_css_class' => 'col-action'
            //]
        //);
		

		
		   $this->addExportType($this->getUrl('customslider/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('customslider/*/exportExcel', ['_current' => true]),__('Excel XML'));

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

	
    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('customslider_id');
        //$this->getMassactionBlock()->setTemplate('Allin_Customslider::customslider/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('customslider');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('customslider/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('customslider/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );


        return $this;
    }
		

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('customslider/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\Customslider\Model\customslider|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'customslider/*/edit',
            ['customslider_id' => $row->getId()]
        );
		
    }

	
		static public function getOptionArray2()
		{
			$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
			$customerGroupsCollection = $objectManager->get('\Magento\Customer\Model\ResourceModel\Group\Collection');
			$customerGroups = $customerGroupsCollection->toOptionArray();
			
			$data_array=array(); 
			foreach($customerGroups as $data){
				$data_array[$data['value']]=$data['label'];	
			}
            return($data_array);
		}
		static public function getValueArray2()
		{
            $data_array=array();
			foreach(\Allin\Customslider\Block\Adminhtml\Customslider\Grid::getOptionArray2() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray3()
		{
            $data_array=array(); 
			$data_array[0]='Enable';
			$data_array[1]='Disable';
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
			foreach(\Allin\Customslider\Block\Adminhtml\Customslider\Grid::getOptionArray3() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}