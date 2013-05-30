<?php

require_once("Model.php");
require_once("entities/SaleOrder.php");
require_once("entities/Connector.php");
require_once("entities/MiddleProduct.php");

class SaleOrderModel extends Model
{
    
    public function __construct()
    {
        
    }

    public static function create($saleOrderObj)
    {
		$pdo = Connector::getPDO();
		
		$pdo->beginTransaction();
        
		try
        {	
			$stmt = $pdo->prepare("INSERT INTO saleorder
									(dateUpdated, dateCreated, dateClosed, dateDue, customerSsn, idUser, status, address)
								   VALUES
									(:dateUpdated, :dateCreated, :dateClosed, :dateDue, :customerSsn, :idUser, :status, :address)");
			    
            $stmt->bindValue(":dateUpdated", $saleOrderObj->dateUpdated);
            $stmt->bindValue(":dateCreated", $saleOrderObj->dateCreated);
            $stmt->bindValue(":dateClosed", $saleOrderObj->dateClosed);
			$stmt->bindValue(":dateDue", $saleOrderObj->dateDue);
            $stmt->bindValue(":customerSsn", $saleOrderObj->customerSsn);
            $stmt->bindValue(":idUser", $saleOrderObj->idUser);
			$stmt->bindValue(":status", $saleOrderObj->status);
			$stmt->bindValue(":address", $saleOrderObj->address);
            $stmt->execute();
			
			$idSaleOrder = $pdo->lastInsertId(); 
			
			foreach ($saleOrderObj->products as $middleProductObj)
            {
                
                $stmt = $pdo->prepare("INSERT INTO saleorder_has_product
                                       (sku, idSaleOrder, dateUpdated, quantityCreated, quantityClosed, currentDiscount, currentPriceSale, currentPriceSupply, currentDescription)
                                      VALUES
                                       (:sku, :idSaleOrder, :dateUpdated, :quantityCreated, :quantityClosed, :currentDiscount, :currentPriceSale, :currentPriceSupply, :currentDescription)");
    
                $stmt->bindValue(":sku", $middleProductObj->sku);
                $stmt->bindValue(":idSaleOrder", $idSaleOrder);
				$stmt->bindValue(":dateUpdated", $saleOrderObj->dateUpdated);
				$stmt->bindValue(":quantityCreated", $middleProductObj->quantityCreated);
				$stmt->bindValue(":quantityClosed", $middleProductObj->quantityClosed);
				$stmt->bindValue(":currentDiscount", $middleProductObj->discount);
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
			throw $e;
            //echo $e->getMessage();
        }		
    }	

    public static function update($saleOrderObj)
    {
		
		date_default_timezone_set('Europe/Athens');
		
		$pdo = Connector::getPDO();
		
		$pdo->beginTransaction();
        
		$dateUpdated = date('Y-m-d H:i:s');
		
		try
        {
			/*No need to check if exists, it's double overhead. If it doesn't exist delete will just cause nothing*/
			
			$sqlDel = null;
			/*If inactive don't keep first, just delete and create a new one*/
			if($saleOrderObj->status == 'inactive')
			{
				$sqlDel = "DELETE FROM saleorder
						   WHERE idSaleOrder = :idSaleOrder
						   AND dateUpdated = dateCreated";
			}
			else
			{
				$sqlDel = "DELETE FROM saleorder
						   WHERE idSaleOrder = :idSaleOrder
						   AND dateUpdated <> dateCreated";
			}
			
			$stmt = $pdo->prepare($sqlDel);
			$stmt->bindValue(":idSaleOrder", $saleOrderObj->idSaleOrder);
			$stmt->execute();
			
			$stmt = $pdo->prepare("INSERT INTO saleorder
									(idSaleOrder, dateUpdated, dateCreated, dateClosed, dateDue, customerSsn, idUser, status, address)
								   VALUES
									(:idSaleOrder, :dateUpdated, :dateCreated, :dateClosed, :dateDue, :customerSsn, :idUser, :status, :address)");
			
			$stmt->bindValue(":idSaleOrder", $saleOrderObj->idSaleOrder);
            $stmt->bindValue(":dateUpdated", $dateUpdated);
            $stmt->bindValue(":dateCreated", $saleOrderObj->dateCreated);
            $stmt->bindValue(":dateClosed", $saleOrderObj->dateClosed);
			$stmt->bindValue(":dateDue", $saleOrderObj->dateDue);
            $stmt->bindValue(":customerSsn", $saleOrderObj->customerSsn);
            $stmt->bindValue(":idUser", $saleOrderObj->idUser);
			$stmt->bindValue(":status", $saleOrderObj->status);
			$stmt->bindValue(":address", $saleOrderObj->address);
            $stmt->execute();
			
			foreach ($saleOrderObj->products as $middleProductObj)
            {
                
                $stmt = $pdo->prepare("INSERT INTO saleorder_has_product
                                       (sku, idSaleOrder, dateUpdated, quantityCreated, quantityClosed, currentDiscount, currentPriceSale, currentPriceSupply, currentDescription)
                                      VALUES
                                       (:sku, :idSaleOrder, :dateUpdated, :quantityCreated, :quantityClosed, :currentDiscount, :currentPriceSale, :currentPriceSupply, :currentDescription)");
    
                $stmt->bindValue(":sku", $middleProductObj->sku);
                $stmt->bindValue(":idSaleOrder", $saleOrderObj->idSaleOrder);
				$stmt->bindValue(":dateUpdated", $dateUpdated);
				$stmt->bindValue(":quantityCreated", $middleProductObj->quantityCreated);
				$stmt->bindValue(":quantityClosed", $middleProductObj->quantityClosed);
				$stmt->bindValue(":currentDiscount", $middleProductObj->discount);
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
			throw $e;
            //echo $e->getMessage();
        }	
    }

    public static function delete($idSaleOrder)
    {
		$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM saleorder WHERE idSaleOrder = :idSaleOrder");

            $stmt->bindValue(":idSaleOrder", $idSaleOrder);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
        	throw $e;
           // echo $e->getMessage();
        }
    }

    public static function getActiveSaleOrders()
    {
		$pdo = Connector::getPDO();
        
        try
        {
        	$stmt = $pdo->prepare("SELECT DISTINCT idSaleOrder
    				               FROM saleorder
    							   WHERE status = 'active'
									");
        	 
        	$stmt->execute();
        	
        	$saleOrderIds = $stmt->fetchAll();
        	
        	
        	foreach ($saleOrderIds as $saleOrderId)
        	{
        		$saleOrderObjArray[]= static::getSaleOrderById($saleOrderId["idSaleOrder"]);
          		
        	}
        	return $saleOrderObjArray;
		}
		catch(PDOException $e)
        {
			$pdo->rollBack();
			throw $e;
            //echo $e->getMessage();
        }	
    }
	
	public static function activateSaleOrder($idSaleOrder)
	{
		$pdo = Connector::getPDO();

        try
        {
        	$stmt = $pdo->prepare("SELECT COUNT(*)
								   FROM saleorder
                                   WHERE idSaleOrder = :idSaleOrder
								   ");
        	
        	$stmt->bindValue(":idSaleOrder", $idSaleOrder);
        	$stmt->execute();
        	
        	
        	$count = (int) $stmt->fetchColumn();
        	
        	if($count ==0){
        		return null;
        	}
        	else if($count ==1){
        		$stmt = $pdo->prepare("UPDATE saleorder SET
									status = 'active'
								  WHERE idSaleOrder = :idSaleOrder");
        	}
        	else{
				$stmt = $pdo->prepare("UPDATE saleorder SET
									status = 'active'
								  WHERE idSaleOrder = :idSaleOrder
								  AND dateCreated <> dateUpdated");
        	}
    	
                
            $stmt->bindValue(":idSaleOrder", $idSaleOrder);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
        	throw $e;
         //   echo $e->getMessage();
        }
	}	
	
	public static function getSaleOrders()
	{
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT * FROM saleorder
									");
			 
			$stmt->execute();
	
			$saleOrderColumns = $stmt->fetchAll();
			$saleOrderObjArray = array();
	
			foreach ($saleOrderColumns as $saleOrderCol)
			{
				$stmt = $pdo->prepare("SELECT sku, currentDescription, currentPriceSale, currentPriceSupply, quantityCreated, quantityClosed, currentDiscount
									  FROM saleorder_has_product
                                      WHERE idSaleOrder = :idSaleOrder
    								  AND dateUpdated = :dateUpdated
									  ");
	
				$stmt->bindValue(":idSaleOrder", $saleOrderCol['idSaleOrder']);
				$stmt->bindValue(":dateUpdated", $saleOrderCol['dateUpdated']);
				$stmt->execute();
	
				$middleProductsColumns = $stmt->fetchAll();
				
				
				$stmt = $pdo->prepare("SELECT username FROM user WHERE idUser = :idUser
									");
				
				$stmt->bindValue(":idUser", $saleOrderCol['idUser']);
				$stmt->execute();
				 
				$username = $stmt->fetchColumn();
				
				
				
	
				$middleProductObjArray = array();
	
				foreach ($middleProductsColumns as $middleProductsCol)
				{
					$middleProductObjArray[] = new MiddleProduct($middleProductsCol['sku'],
							$middleProductsCol['currentDescription'],
							$middleProductsCol['currentPriceSale'],
							$middleProductsCol['currentPriceSupply'],
							$middleProductsCol["currentDiscount"],
							$middleProductsCol['quantityCreated'],
							$middleProductsCol['quantityClosed']);
				}
				$saleOrderObjArray[] =  new SaleOrder($saleOrderCol['dateDue'],
						$saleOrderCol['customerSsn'],
						$saleOrderCol['idUser'],
						$saleOrderCol['status'],
						$middleProductObjArray,
						$saleOrderCol['dateCreated'],
						$saleOrderCol['idSaleOrder'],
						$saleOrderCol['dateUpdated'],
						$saleOrderCol['dateClosed'],
						$saleOrderCol['address'],
						$username);
			}
			return $saleOrderObjArray;
		}
		catch(PDOException $e)
		{
	
			//	throw $e;
			echo $e->getMessage();
		}
	}
	
	public static function getSaleOrdersByProduct($productSku)
	{
	
	}
	
	public static function getSaleOrderById($idSaleOrder)
	{
		$pdo = Connector::getPDO();
		 
		try
		{
			$stmt = $pdo->prepare("SELECT COUNT(*)
								   FROM saleorder
                                   WHERE idSaleOrder = :idSaleOrder
								   ");
			 
			$stmt->bindValue(":idSaleOrder", $idSaleOrder);
			$stmt->execute();
		
		
			$count = (int) $stmt->fetchColumn();
		
			if($count ==0){
				return null;
			}
			else if($count ==1){
				$stmt = $pdo->prepare("SELECT * FROM saleorder
    								   WHERE idSaleOrder = :idSaleOrder
									");
			}
			else{
				$stmt = $pdo->prepare("SELECT * FROM saleorder
    								   WHERE idSaleOrder = :idSaleOrder
    								   AND dateCreated <> dateUpdated
									");
			}
		
			$stmt->bindValue(":idSaleOrder", $idSaleOrder);
			$stmt->execute();
			 
			$saleOrderCol = $stmt->fetch();
			
			
			$stmt = $pdo->prepare("SELECT username FROM user WHERE idUser = :idUser
									");
			
			$stmt->bindValue(":idUser", $saleOrderCol['idUser']);
			$stmt->execute();
			 
			$username = $stmt->fetchColumn();
	
			 
			$stmt = $pdo->prepare("SELECT sku, currentDescription, currentPriceSale, currentPriceSupply, currentDiscount, quantityCreated, quantityClosed
									  FROM saleorder_has_product
                                      WHERE idSaleOrder = :idSaleOrder
									  AND dateUpdated = :dateUpdated");  

                $stmt->bindValue(":idSaleOrder", $saleOrderCol['idSaleOrder']);
				$stmt->bindValue(":dateUpdated", $saleOrderCol['dateUpdated']);
                $stmt->execute();
                
                $middleProductsColumns = $stmt->fetchAll();
                
                $middleProductObjArray = array();
                
                foreach ($middleProductsColumns as $middleProductsCol)
                {
                    $middleProductObjArray[] = new MiddleProduct($middleProductsCol['sku'], 
																 $middleProductsCol['currentDescription'],
																 $middleProductsCol['currentPriceSale'],
																 $middleProductsCol['currentPriceSupply'],
																 $middleProductsCol['currentDiscount'],
																 $middleProductsCol['quantityCreated'],
																 $middleProductsCol['quantityClosed']);
                }
                
                $saleOrderObj =  new SaleOrder($saleOrderCol['dateDue'],
													  $saleOrderCol['customerSsn'],
													  $saleOrderCol['idUser'],
													  $saleOrderCol['status'],
													  $middleProductObjArray,
													  $saleOrderCol['dateCreated'],
													  $saleOrderCol['idSaleOrder'],
													  $saleOrderCol['dateUpdated'],
                									  $saleOrderCol['dateClosed'],
                									  $saleOrderCol['address'],
                									  $username);
		
			return $saleOrderObj;
		}
		catch(PDOException $e)
		{
			 
			//	throw $e;
			echo $e->getMessage();
		}
	}
	
	public static function getSaleOrdersByStatus($username, $status)
	{
		$pdo = Connector::getPDO();
		
        try
        {
			$stmt = $pdo->prepare("SELECT idUser, role FROM user WHERE username = :username");
			$stmt->bindValue(":username", $username);
            $stmt->execute();
			
			$userCol = $stmt->fetch(PDO::FETCH_ASSOC);
				
			$sqlSelectOrders = null;
			
			if( $userCol['role'] == 'MANAGER' )
			{
				$stmt = $pdo->prepare("SELECT * FROM saleorder 
									  WHERE dateCreated <> dateUpdated 
									  AND status = :status");				  
			} 
			else
			{
				$stmt = $pdo->prepare("SELECT * FROM saleorder 
									  WHERE idUser = :idUser 
									  AND dateCreated <> dateUpdated 
									  AND status = :status");
									  
				$stmt->bindValue(":idUser", $userCol['idUser']);
			}
			
			$stmt->bindValue(":status", $status);
            $stmt->execute();

            $saleOrderColumns = $stmt->fetchAll();
            
            $saleOrderObjArray = array();
            
            
            
            
            
            foreach ($saleOrderColumns as $saleOrderCol)
            {
                
            	$stmt = $pdo->prepare("SELECT username FROM user WHERE idUser = :idUser
									");
            	
            	$stmt->bindValue(":idUser", $saleOrderCol['idUser']);
            	$stmt->execute();
            	 
            	$username = $stmt->fetchColumn();
            	
            	
                $stmt = $pdo->prepare("SELECT sku, currentDescription, currentPriceSale, currentPriceSupply, currentDiscount, quantityCreated, quantityClosed
									  FROM saleorder_has_product
                                      WHERE idSaleOrder = :idSaleOrder
									  AND dateUpdated = :dateUpdated");  

                $stmt->bindValue(":idSaleOrder", $saleOrderCol['idSaleOrder']);
				$stmt->bindValue(":dateUpdated", $saleOrderCol['dateUpdated']);
                $stmt->execute();
                
                $middleProductsColumns = $stmt->fetchAll();
                
                $middleProductObjArray = array();
                
                foreach ($middleProductsColumns as $middleProductsCol)
                {
                    $middleProductObjArray[] = new MiddleProduct($middleProductsCol['sku'], 
																 $middleProductsCol['currentDescription'],
																 $middleProductsCol['currentPriceSale'],
																 $middleProductsCol['currentPriceSupply'],
																 $middleProductsCol['currentDiscount'],
																 $middleProductsCol['quantityCreated'],
																 $middleProductsCol['quantityClosed']);
                }
                
                $saleOrderObjArray[] =  new SaleOrder($saleOrderCol['dateDue'],
													  $saleOrderCol['customerSsn'],
													  $saleOrderCol['idUser'],
													  $saleOrderCol['status'],
													  $middleProductObjArray,
													  $saleOrderCol['dateCreated'],
													  $saleOrderCol['idSaleOrder'],
													  $saleOrderCol['dateUpdated'],
                									  $saleOrderCol['dateClosed'],
                									  $saleOrderCol['address'],
                									  $username);
            }
            return $saleOrderObjArray;
		}
		catch(PDOException $e)
        {
			$pdo->rollBack();
			throw $e;
            //echo $e->getMessage();
        }	
	}
	
	public static function getSaleOrdersByDate($dateTime)
	{
	
	}
}