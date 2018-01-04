<?php
namespace Allin\Backinstock\Observer;

class Backinstock implements \Magento\Framework\Event\ObserverInterface
{
  public function execute(\Magento\Framework\Event\Observer $observer)
  {
				
		$product = $observer->getEvent()->getProduct();
		
		if($product->getId()){
			
			$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
			$stockItem = $objectManager->get('\Magento\CatalogInventory\Model\Stock\StockItemRepository');
			$productStock = $stockItem->get($product->getId());
			$old_quantity = $productStock->getData('qty');
			$olddate = $product->getCreated_at();
			$request = $objectManager->get('\Magento\Framework\App\RequestInterface');
			$getPostData = $request->getPost('product');
			$new_quantity = $getPostData['quantity_and_stock_status']['qty'];
			$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
			$connection = $resource->getConnection();
			$tableName = $resource->getTableName('backinstock');

			$sql = "SELECT * FROM ".$tableName. " WHERE `p_id` = ".$product->getId();
			 $result = $connection->fetchOne($sql);
			 $resultAll = $connection->fetchAll($sql);		 
			 if($result){
				 
					$sql = "UPDATE ".$tableName." SET `p_id`='".$product->getId()."',`oldqty`='".$old_quantity."',`newqty`='".$new_quantity."',   `previous_date`='".$resultAll[0]['newdate']."',`newdate`='".date("Y-m-d H:i:s")."' WHERE `p_id`='".$product->getId()."'";
					$connection->query($sql);	 
			 }else{
				$sql = "INSERT INTO ".$tableName." values('','".$product->getId()."','".$old_quantity."','".$new_quantity."','".$olddate."','".date("Y-m-d H:i:s")."')";
				
				$connection->query($sql);	 
			 }
		 
		 }




  }
}