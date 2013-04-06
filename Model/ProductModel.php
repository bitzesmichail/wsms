<?php
 
require_once("Model.php");

class ProductModel extends Model
{
    
    public function __construct()
    {
        
    }
    
    public static function create($productObj) //ta default prepei na mpoun sto telos gia na paraleipontai otan den xreiazontai
    {
	$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO Product
                                    (idProduct, sku, description, priceSale, priceSupply, availableSum, reservedSum, orderedSum, criticalSum)
                                   VALUES
                                    (:idProduct, :sku, :description, :priceSale, :priceSupply, :availableSum, :reservedSum, :orderedSum, :criticalSum)");

	    $stmt->bindValue(":idProduct", $productObj->idProduct);			    
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
            echo $e->getMessage();
        }
    }

    public static function update($productObj)
    {
	$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE Product SET
				    sku = :sku,
				    description = :description,
				    priceSale = :priceSale,
				    priceSupply = :priceSupply,
				    availableSum = :availableSum,
				    reservedSum = :reservedSum,
				    orderedSum = :orderedSum,
				    criticalSum = :criticalSum
				  WHERE idProduct = :idProduct");
            
            $stmt->bindValue(":sku", $productObj->sku);
            $stmt->bindValue(":description", $productObj->description);
            $stmt->bindValue(":priceSale", $productObj->priceSale);
	    $stmt->bindValue(":priceSupply", $productObj->priceSupply);
            $stmt->bindValue(":availableSum", $productObj->availableSum);
            $stmt->bindValue(":reservedSum", $productObj->reservedSum);
	    $stmt->bindValue(":orderedSum", $productObj->orderedSum);
            $stmt->bindValue(":criticalSum", $productObj->criticalSum);
	    $stmt->bindValue(":idProduct", $productObj->idProduct);
            $stmt->execute();
            return 0;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function delete($idProduct)
    {
	$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM Product WHERE idProduct = :idProduct");

            $stmt->bindValue(":idProduct", $idProduct);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getProducts()
    {
	$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM Product");          
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
						  $productCol['criticalSum'],
						  $productCol['idProduct'],);
            }
            
            return $productObjArray;
        }
        
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
}