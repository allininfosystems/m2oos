<?php

namespace Allin\Customsearch\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Checkout\Model\Cart;
use Magento\Quote\Model\QuoteManagement;
use Magento\Customer\Helper\Session\CurrentCustomer;



class Orderplace extends \Magento\Framework\App\Action\Action
{
	
	//public $context;
	public $cart;
	public $quoteManagement;
	public $currentCustomer;
	protected $resultRedirect;
	
	
	public function __construct(
			Context $context,
			Cart $cart,
			QuoteManagement $quoteManagement,
			CurrentCustomer $currentCustomer
			 
			 
			 
        ) {
			$this->_cart = $cart;
			$this->_currentCustomer = $currentCustomer;
			$this->_quotemanagement = $quoteManagement;
			//$this->cartRepositoryInterface = $cartRepositoryInterface;
           // $this->cartManagementInterface = $cartManagementInterface;
			//$this->order = $order;
			parent::__construct($context);
        }
    public function execute()
    {
		
		
		$comments = $this->getRequest()->getPost('comments');
		
		// Get quote from the cart (_cart is a Magento\Checkout\Model\Cart)
		$quote = $this->_cart->getQuote ();

		// Ensure our quote has our customer ID (_current customer is Magento\Customer\Helper\Session\CurrentCustomer)
		$quote->setCustomerId ($this->_currentCustomer->getCustomerId());

		
		/**************************/
		$billingID = $this->_currentCustomer->getCustomer()->getDefaultBilling();
		$shippingID = $this->_currentCustomer->getCustomer()->getDefaultShipping();
		
		if(empty($billingID)){
			echo '0';
			exit();
		}elseif(empty($billingID)){
			echo '0';
			exit();
		}
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$billingAddress = $objectManager->create('Magento\Customer\Model\Address')->load($billingID);
		$shippingAddress = $objectManager->create('Magento\Customer\Model\Address')->load($shippingID);

		//echo "<pre>";print_r($shippingAddress->getData());die('testinddddddd');
		
		$b_firstname='';
		$b_lastname='';
		$b_street='';
		$b_city='';
		$b_telephone='';
		$b_postcode='';
		$b_regionId='';
		$b_countryId='';
		
		$b_firstname = $billingAddress->getFirstname();
		$b_lastname = $billingAddress->getLastname();
		$b_street = $billingAddress->getStreet();
		$b_city = $billingAddress->getCity();
		$b_telephone = $billingAddress->getTelephone();
		$b_postcode = $billingAddress->getPostcode();
		$b_regionId = $billingAddress->getRegionId();
		$b_countryId = $billingAddress->getCountryId();
		
		if($b_firstname=='' || $b_lastname=='' || $b_street=='' || $b_city=='' || $b_telephone=='' || $b_postcode=='' || $b_regionId=='' || $b_countryId==''){
			echo '0';
			exit();
		}
		//$countryData = $this->_countryFactory->create()->loadByCode($b_countryCode);
		//echo '<pre>';print_r($countryData->getData());
		
		$s_firstname='';
		$s_lastname='';
		$s_street='';
		$s_city='';
		$s_telephone='';
		$s_postcode='';
		$s_regionId='';
		$s_countryId='';
		
		$s_firstname = $shippingAddress->getFirstname();
		$s_lastname = $shippingAddress->getLastname();
		$s_street = $shippingAddress->getStreet();
		$s_city = $shippingAddress->getCity();
		$s_telephone = $shippingAddress->getTelephone();
		$s_postcode = $shippingAddress->getPostcode();
		$s_regionId = $shippingAddress->getRegionId();
		$s_countryId = $shippingAddress->getCountryId();
		
		if($s_firstname=='' || $s_lastname=='' || $s_street=='' || $s_city=='' || $s_telephone=='' || $s_postcode=='' || $s_regionId=='' || $s_countryId==''){
			echo '0';
			exit();
		}
		//echo "<pre>";print_r($address->getData());exit;
		
		/**************************/
		
		$billing = $quote->getBillingAddress();
		$billing->setFirstname($b_firstname);
		$billing->setLastname($b_lastname);
		$billing->setStreet($b_street);
		$billing->setCity($b_city);
		$billing->setTelephone($b_telephone);
		$billing->setPostcode($b_postcode);
		$billing->setRegionId($b_regionId);
		$billing->setCountryId($b_countryId);
		
		$shipping = $quote->getShippingAddress();
		$shipping->setFirstname($s_firstname);
		$shipping->setLastname($s_lastname);
		$shipping->setStreet($s_street);
		$shipping->setCity($s_city);
		$shipping->setTelephone($s_telephone);
		$shipping->setPostcode($s_postcode);
		$shipping->setRegionId($s_regionId);
		$shipping->setCountryId($s_countryId);
		// ... 

		 // Collect Rates and Set Shipping

        $shippingAddress=$quote->getShippingAddress();
        $shippingAddress->setCollectShippingRates(true)
                        ->collectShippingRates()
                        ->setShippingMethod('freeshipping_freeshipping'); //shipping method
						
		// Set the payment methods
		
		$quote->setPaymentMethod('checkmo');

		// Set Sales Order Payment
		$quote->getPayment()->importData (array ('method' => 'checkmo'));

		// Configure quote
		//$quote->setInventoryProcessed (false);
		//$quote->collectTotals ();

		// Update changes
		$quote->save ();

		// Place order (Magento\Quote\Model\QuoteManagement)
		$order_id = $this->_quotemanagement->placeOrder ($quote->getId());
		echo $order_id;
		
		//$quote = $this->cartRepositoryInterface->get($quote->getId());
      //  $orderId = $this->cartManagementInterface->placeOrder($quote->getId());
       // $order = $this->order->load($order_id);
       // $order->setSendEmail(true);
       // $order->setEmailSent(true);
		
		
		// Comment Section
		
		//$status = $order->getData('status');
		/** @param \Magento\Sales\Model\Order\Status\HistoryFactory $history */
		//$history = $this->historyFactory->create();
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$history = $objectManager->create('Magento\Sales\Model\Order\Status\HistoryFactory')->create();
        $order = $objectManager->create('\Magento\Sales\Model\Order')->load($order_id);
        $status = $order->getStatus();
		
		// set comment history data
		$history->setData('comment', $comments);
		$history->setData('parent_id', $order_id);
		$history->setData('is_visible_on_front', 1);
		$history->setData('is_customer_notified', 0);
		$history->setData('entity_name', 'order');
		$history->setData('status', $status);
		$history->save();
		echo 'final testing';
		exit();        
    }
}