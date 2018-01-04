<?php

namespace Allin\Customsearch\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Productsearch extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		/* $this->_view->loadLayout();
		$this->_view->getLayout()->initMessages();
		$this->_view->renderLayout(); */
		return $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);

    }
}


