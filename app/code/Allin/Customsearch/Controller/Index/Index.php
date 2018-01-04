<?php

namespace Allin\Customsearch\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$baseUrl= $storeManager->getStore()->getBaseUrl();								
		$customerSession = $objectManager->create('Magento\Customer\Model\Session');
		 if (!$customerSession->isLoggedIn()) {	
		   $this->_redirect($baseUrl);
				}
    }
}