<?php

namespace Allin\Customsearch\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Productsearch extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		
		$product_id = $this->getRequest()->getPost('product_id');
		$product_row = $this->getRequest()->getPost('product_row');
		
		if(isset($product_row) && $product_row == 1 && !empty($product_id)){
				//Check Quantity
				$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
				$productStockObj = $objectManager->create('Magento\CatalogInventory\Api\StockRegistryInterface')->getStockItem($product_id);
				if(floor($productStockObj->getData('qty')) < 5){
					//$msg = array();
					//$msg['msg'] = '*!!!Sorry product quatity is less than 5.';
					echo "1";
					exit();
				}
		}
		
		
		return $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);

    }
}


