<?php
 
require_once("Model.php");
require_once("entities/Product.php");
require_once("entities/Connector.php");

class ProductModel extends Model
{
    public function __construct()
    {
        //parent::__construct();
    }
    
    public static function create($productObj) //ta default prepei na mpoun sto telos gia na paraleipontai otan den xreiazontai
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO product
                                    (sku, description, priceSale, priceSupply, availableSum, reservedSum, orderedSum, criticalSum)
                                   VALUES
                                    (:sku, :description, :priceSale, :priceSupply, :availableSum, :reservedSum, :orderedSum, :criticalSum)");
		    
            $stmt->bindValue(":sku", $productObj->sku);
            $stmt->bindValue(":description", $productObj->description);
            $stmt->bindValue(":priceSale", $productObj->priceSale);
			$stmt->bindValue(":priceSupply", $productObj->priceSupply);
            $stmt->bindValue(":availableSum", $productObj->availableSum);
            $stmt->bindValue(":reservedSum", $productObj->reservedSum);
			$stmt->bindValue(":orderedSum", $productObj->orderedSum);
            $stmt->bindValue(":criticalSum", $productObj->criticalSum);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
        	throw $e;
        //    echo $e->getMessage();
        }
    }

    public static function update($productObj)
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE product SET
									description = :description,
									priceSale = :priceSale,
									priceSupply = :priceSupply,
									availableSum = :availableSum,
									reservedSum = :reservedSum,
									orderedSum = :orderedSum,
									criticalSum = :criticalSum
								  WHERE sku = :productSku");
            
            $stmt->bindValue(":productSku", $productObj->sku);
            $stmt->bindValue(":description", $productObj->description);
            $stmt->bindValue(":priceSale", $productObj->priceSale);
			$stmt->bindValue(":priceSupply", $productObj->priceSupply);
            $stmt->bindValue(":availableSum", $productObj->availableSum);
            $stmt->bindValue(":reservedSum", $productObj->reservedSum);
			$stmt->bindValue(":orderedSum", $productObj->orderedSum);
            $stmt->bindValue(":criticalSum", $productObj->criticalSum);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
        	throw $e;
         //   echo $e->getMessage();
        }
    }

    public static function delete($productSku)
    {
		$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM product WHERE sku = :productSku");

            $stmt->bindValue(":productSku", $productSku);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
        	throw $e;
           // echo $e->getMessage();
        }
    }

    public static function getProducts()
    {
		$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM product");          
            $stmt->execute();

            $productsColumns = $stmt->fetchAll();
            
            $productObjArray = array();
            
            foreach ($productsColumns as $productCol)
            {
                $productObjArray[] =  new Product($productCol['sku'],
												  $productCol['description'],
												  $productCol['priceSale'],
												  $productCol['priceSupply'],
												  $productCol['availableSum'],
												  $productCol['reservedSum'],
												  $productCol['orderedSum'],
												  $productCol['criticalSum']);
            }
            
            return $productObjArray;
        }
        
        catch(PDOException $e) 
        {
        	throw $e;
           // echo $e->getMessage();
        }
    }
    
    public static function getProductBySku($productSku)
    {
		$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM product WHERE sku = :productSku");

            $stmt->bindValue(":productSku", $productSku);
            $stmt->execute();
	    
            $productCol = $stmt->fetch(PDO::FETCH_ASSOC);
	    
			return new Product($productCol["sku"],
							   $productCol["description"],
							   $productCol["priceSale"],
							   $productCol["priceSupply"],
							   $productCol["availableSum"],
							   $productCol["reservedSum"],
							   $productCol["orderedSum"],
							   $productCol["criticalSum"]);
        }
        catch(PDOException $e) 
        {
        	throw $e;
          //  echo $e->getMessage();
        }
    }  
}
