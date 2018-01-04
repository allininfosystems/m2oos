<?php
namespace Allin\Backinstock\Block\Adminhtml\Backinstock;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\Backinstock\Model\backinstockFactory
     */
    protected $_backinstockFactory;

    /**
     * @var \Allin\Backinstock\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\Backinstock\Model\backinstockFactory $backinstockFactory
     * @param \Allin\Backinstock\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\Backinstock\Model\BackinstockFactory $BackinstockFactory,
        \Allin\Backinstock\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_backinstockFactory = $BackinstockFactory;
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
        $this->setDefaultSort('backinstock_id');
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
        $collection = $this->_backinstockFactory->create()->getCollection();
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
            'backinstock_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'backinstock_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );


		
				$this->addColumn(
					'p_id',
					[
						'header' => __('Product ID'),
						'index' => 'p_id',
					]
				);
				
				$this->addColumn(
					'oldqty',
					[
						'header' => __('Old Quantity'),
						'index' => 'oldqty',
					]
				);
				
				$this->addColumn(
					'newqty',
					[
						'header' => __('New Quantity'),
						'index' => 'newqty',
					]
				);
				
				$this->addColumn(
					'previous_date',
					[
						'header' => __('Previous Date'),
						'index' => 'previous_date',
					]
				);
				
				$this->addColumn(
					'newdate',
					[
						'header' => __('Current Date'),
						'index' => 'newdate',
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
                        //'field' => 'backinstock_id'
                    //]
                //],
                //'filter' => false,
                //'sortable' => false,
                //'index' => 'stores',
                //'header_css_class' => 'col-action',
                //'column_css_class' => 'col-action'
            //]
        //);
		

		
		   $this->addExportType($this->getUrl('backinstock/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('backinstock/*/exportExcel', ['_current' => true]),__('Excel XML'));

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

        $this->setMassactionIdField('backinstock_id');
        //$this->getMassactionBlock()->setTemplate('Allin_Backinstock::backinstock/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('backinstock');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('backinstock/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('backinstock/*/massStatus', ['_current' => true]),
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
        return $this->getUrl('backinstock/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\Backinstock\Model\backinstock|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'backinstock/*/edit',
            ['backinstock_id' => $row->getId()]
        );
		
    }

	

}