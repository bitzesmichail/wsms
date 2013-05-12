<?php

require_once("Model.php");
require_once("entities/SaleOrder.php");
require_once("entities/Connector.php");

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
									(dateUpdated, dateCreated, dateClosed, dateDue, customerSsn, idUser, status)
								   VALUES
									(:dateUpdated, :dateCreated, :dateClosed, :dateDue, :customerSsn, :idUser, :status)");
			    
            $stmt->bindValue(":dateUpdated", $saleOrderObj->dateUpdated);
            $stmt->bindValue(":dateCreated", $saleOrderObj->dateCreated);
            $stmt->bindValue(":dateClosed", $saleOrderObj->dateClosed);
			$stmt->bindValue(":dateDue", $saleOrderObj->dateDue);
            $stmt->bindValue(":customerSsn", $saleOrderObj->customerSsn);
            $stmt->bindValue(":idUser", $saleOrderObj->idUser);
			$stmt->bindValue(":status", $saleOrderObj->status);
            $stmt->execute();

			$idSaleOrder = $pdo->lastInsertId(); 
			
			foreach ($saleOrderObj->products as $middleProductObj)
            {
                
                $stmt = $pdo->prepare("INSERT INTO saleorder_has_product
                                       (sku, idSaleOrder, dateUpdated, quantityCreated, currentDiscount, currentPriceSale, currentPriceSupply, currentDescription)
                                      VALUES
                                       (:sku, :idSaleOrder, :dateUpdated, :quantityCreated, :currentDiscount, :currentPriceSale, :currentPriceSupply, :currentDescription)");
    
                $stmt->bindValue(":sku", $middleProductObj->sku);
                $stmt->bindValue(":idSaleOrder", $idSaleOrder);
				$stmt->bindValue(":dateUpdated", $saleOrderObj->dateUpdated);
				$stmt->bindValue(":quantityCreated", $middleProductObj->quantityCreated);
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
	
    }

    public static function delete($idSaleOrder)
    {
	
    }

    public static function getSaleOrders()
    {
		$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM saleorder WHERE dateCreated <> dateUpdated");          
            $stmt->execute();

            $saleOrderColumns = $stmt->fetchAll();
            
            $saleOrderObjArray = array();
            
            foreach ($saleOrderColumns as $saleOrderCol)
            {
                
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
													  $saleOrderCol['dateCreated']);     
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

	public static function getSaleOrdersByCustomer($customerSsn)
	{
	
	}
	
	public static function getSaleOrdersByProduct($productSku)
	{
	
	}
	
	public static function getSaleOrderById($idSaleOrder) 
	{
		
	}
	
	public static function getSaleOrdersByStatus($status)
	{
	
	}
	
	public static function getSaleOrdersByDate($dateTime)
	{
	
	}
}