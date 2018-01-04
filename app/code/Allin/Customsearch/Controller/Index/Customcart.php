<?php

namespace Allin\Customsearch\Controller\Index;


	use Magento\Framework\App\Action\Context;
    use Magento\Framework\View\Result\PageFactory;

    class Customcart extends \Magento\Customer\Controller\AbstractAccount
    {
        /**
         * @var PageFactory
         */
        protected $resultPageFactory;
        /**
         * @var \Magento\Framework\Data\Form\FormKey
         */
        protected $formKey;
        /**
         * @param Context $context
         * @param PageFactory $resultPageFactory
         */
        public function __construct(
            Context $context,
            \Magento\Framework\Data\Form\FormKey $formKey,
            PageFactory $resultPageFactory
        ) {
            parent::__construct($context);
            $this->formKey = $formKey;
            $this->resultPageFactory = $resultPageFactory;
        }

        /**
         *
         * @return \Magento\Framework\View\Result\Page
         */
        public function execute()
        {
			$product_id = $this->getRequest()->getPost('product_id');
			$product_qty = $this->getRequest()->getPost('product_qty');
			
			$resultPage = $this->resultPageFactory->create();
			$params = array(
				'form_key' => $this->formKey->getFormKey(),
				'product' =>$product_id,//product Id
				'qty'   =>$product_qty //quantity of product
			 
			);

			$this->_redirect("checkout/cart/add/form_key/", $params);
            /** @var \Magento\Framework\View\Result\Page $resultPage */

            return $resultPage;

			exit;
        }
    }