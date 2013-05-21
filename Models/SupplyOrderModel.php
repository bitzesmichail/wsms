<?php
 
require_once("Model.php");
require_once("entities/SupplyOrder.php");
require_once("entities/MiddleProduct.php");
require_once("entities/Connector.php");

class SupplyOrderModel extends Model
{
    
    public function __construct()
    {
        
    }

    public static function create($supplyOrderObj)
    {
    	$pdo = Connector::getPDO();
    
    	$pdo->beginTransaction();
    
    	try
    	{
    		$stmt = $pdo->prepare("INSERT INTO supplyorder
									(dateUpdated, dateCreated, dateClosed, dateDue, providerSsn, idUser, status)
								   VALUES
									(:dateUpdated, :dateCreated, :dateClosed, :dateDue, :providerSsn, :idUser, :status)");
    		 
    		$stmt->bindValue(":dateUpdated", $supplyOrderObj->dateUpdated);
    		$stmt->bindValue(":dateCreated", $supplyOrderObj->dateCreated);
    		$stmt->bindValue(":dateClosed", $supplyOrderObj->dateClosed);
    		$stmt->bindValue(":dateDue", $supplyOrderObj->dateDue);
    		$stmt->bindValue(":providerSsn", $supplyOrderObj->providerSsn);
    		$stmt->bindValue(":idUser", $supplyOrderObj->idUser);
    		$stmt->bindValue(":status", $supplyOrderObj->status);
    		$stmt->execute();
    
    		$idSupplyOrder = $pdo->lastInsertId();
    			
    		foreach ($supplyOrderObj->products as $middleProductObj)
    		{
    
    			$stmt = $pdo->prepare("INSERT INTO supplyorder_has_product
                                       (sku, idSupplyOrder, dateUpdated, quantityCreated, currentPriceSale, currentPriceSupply, currentDescription)
                                      VALUES
                                       (:sku, :idSupplyOrder, :dateUpdated, :quantityCreated, :currentPriceSale, :currentPriceSupply, :currentDescription)");
    
    			$stmt->bindValue(":dateUpdated", $supplyOrderObj->dateUpdated);
    			$stmt->bindValue(":sku", $middleProductObj->sku);
    			$stmt->bindValue(":idSupplyOrder", $idSupplyOrder);
    			$stmt->bindValue(":quantityCreated", $middleProductObj->quantityCreated);
    			$stmt->bindValue(":currentPriceSale", $middleProductObj->priceSale);
    			$stmt->bindValue(":currentPriceSupply", $middleProductObj->priceSupply);
    			$stmt->bindValue(":currentDescription", $middleProductObj->description);
    			$stmt->execute();
    		}
    			
    		$pdo->commit();
    	}
    	catch(PDOException $e)
    	{
    		$pdo->rollBack();
    //		throw $e;
    		echo $e->getMessage();
    	}
    }
    
    public static function update($supplyOrderObj)
    {
    	date_default_timezone_set('Europe/Athens');
    	
    	$pdo = Connector::getPDO();
    	
    	$pdo->beginTransaction();
    	
    	$dateUpdated = date('Y-m-d H:i:s');
    	
    	try
    	{
    		/*No need to check if exists, it's double overhead. If it doesn't exist delete will just cause nothing*/
    			
    		$sqlDel = null;

    		$sqlDel = "DELETE FROM supplyorder
					   WHERE idSupplyOrder = :idSupplyOrder
					   AND dateUpdated <> dateCreated";

    			
    		$stmt = $pdo->prepare($sqlDel);
    		$stmt->bindValue(":idSupplyOrder", $supplyOrderObj->idSupplyOrder);
    		$stmt->execute();
    		
    		$stmt = $pdo->prepare("INSERT INTO supplyorder
									(idSupplyOrder, dateUpdated, dateCreated, dateClosed, dateDue, providerSsn, idUser, status)
								   VALUES
									(:idSupplyOrder, :dateUpdated, :dateCreated, :dateClosed, :dateDue, :providerSsn, :idUser, :status)");
    		 
    		$stmt->bindValue(":idSupplyOrder", $supplyOrderObj->idSupplyOrder);
    		$stmt->bindValue(":dateUpdated", $dateUpdated);
    		$stmt->bindValue(":dateCreated", $supplyOrderObj->dateCreated);
    		$stmt->bindValue(":dateClosed", $supplyOrderObj->dateClosed);
    		$stmt->bindValue(":dateDue", $supplyOrderObj->dateDue);
    		$stmt->bindValue(":providerSsn", $supplyOrderObj->providerSsn);
    		$stmt->bindValue(":idUser", $supplyOrderObj->idUser);
    		$stmt->bindValue(":status", $supplyOrderObj->status);
    		$stmt->execute();

    		
    		 
    		foreach ($supplyOrderObj->products as $middleProductObj)
    		{
    		
    			$stmt = $pdo->prepare("INSERT INTO supplyorder_has_product
                                       (sku, idSupplyOrder, dateUpdated, quantityCreated, currentPriceSale, currentPriceSupply, currentDescription)
                                      VALUES
                                       (:sku, :idSupplyOrder, :dateUpdated, :quantityCreated, :currentPriceSale, :currentPriceSupply, :currentDescription)");
    		
    			$stmt->bindValue(":dateUpdated", $dateUpdated);
    			$stmt->bindValue(":sku", $middleProductObj->sku);
    			$stmt->bindValue(":idSupplyOrder", $supplyOrderObj->idSupplyOrder);
    			$stmt->bindValue(":quantityCreated", $middleProductObj->quantityCreated);
    			$stmt->bindValue(":currentPriceSale", $middleProductObj->priceSale);
    			$stmt->bindValue(":currentPriceSupply", $middleProductObj->priceSupply);
    			$stmt->bindValue(":currentDescription", $middleProductObj->description);
    			$stmt->execute();
    		}

    		$pdo->commit();
    	}
    	catch(PDOException $e)
    	{
    		$pdo->rollBack();
    		//throw $e;
    		//echo $e->getMessage();
    	}

    }
    
    public static function delete($idSupplyOrder)
    {
    	$pdo = Connector::getPDO();
    
    	try
    	{
    		$stmt = $pdo->prepare("DELETE FROM supplyorder WHERE idSupplyOrder = :idSupplyOrder");
    
    		$stmt->bindValue(":idSupplyOrder", $idSupplyOrder);
    		$stmt->execute();
    	}
    	catch(PDOException $e)
    	{
    	//	throw $e;
    		 echo $e->getMessage();
    	}
    }
    
    public static function getSupplyOrders()
    {
    	$pdo = Connector::getPDO();
    
    	try
    	{
    		$stmt = $pdo->prepare("SELECT * FROM supplyorder
									");
    			
    		$stmt->execute();
    
    		$supplyOrderColumns = $stmt->fetchAll();
    		$supplyOrderObjArray = array();
    
    		foreach ($supplyOrderColumns as $supplyOrderCol)
    		{
    			$stmt = $pdo->prepare("SELECT sku, currentDescription, currentPriceSale, currentPriceSupply, quantityCreated, quantityClosed
									  FROM supplyorder_has_product
                                      WHERE idSupplyOrder = :idSupplyOrder 
    								  AND dateUpdated = :dateUpdated
									  ");
    
    			$stmt->bindValue(":idSupplyOrder", $supplyOrderCol['idSupplyOrder']);
    			$stmt->bindValue(":dateUpdated", $supplyOrderCol['dateUpdated']);
    			$stmt->execute();
    
    			$middleProductsColumns = $stmt->fetchAll();
    
    			$middleProductObjArray = array();
    
    			foreach ($middleProductsColumns as $middleProductsCol)
    			{
    				$middleProductObjArray[] = new MiddleProduct($middleProductsCol['sku'],
    						$middleProductsCol['currentDescription'],
    						$middleProductsCol['currentPriceSale'],
    						$middleProductsCol['currentPriceSupply'],
    						NULL,
    						$middleProductsCol['quantityCreated'],
    						$middleProductsCol['quantityClosed']);
    			}
    			$supplyOrderObjArray[] =  new SupplyOrder($supplyOrderCol['dateDue'],
    					$supplyOrderCol['providerSsn'],
    					$supplyOrderCol['idUser'],
    					$supplyOrderCol['status'],
    					$middleProductObjArray,
    					$supplyOrderCol['dateCreated'],
    					$supplyOrderCol['idSupplyOrder'],
    					$supplyOrderCol['dateUpdated']);
    		}
    		return $supplyOrderObjArray;
    	}
    	catch(PDOException $e)
    	{
    	//	$pdo->rollBack();
    	//	throw $e;
    		echo $e->getMessage();
    	}
    }
    
    
    public static function getSupplyOrdersByProduct($productSku)
    {
    
    }
    
    public static function getSupplyOrderById($idSaleOrder)
    {
    
    }
    
    public static function getSupplyOrdersByDate($dateTime)
    {
    
    }
    
}