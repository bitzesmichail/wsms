<?php

require_once("Model.php");
require_once("entities/WishProduct.php");
require_once("entities/Connector.php");

class WishProductModel extends Model
{
    
    public function __construct()
    {
        
    }

    public static function create($wishProductObj) //ta default prepei na mpoun sto telos gia na paraleipontai otan den xreiazontai
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO wishproduct
                                    (quantity, description, idUser)
                                   VALUES
                                    (:quantity, :description, :idUser)");
		    
            $stmt->bindValue(":quantity", $wishProductObj->quantity);
            $stmt->bindValue(":description", $wishProductObj->description);
            $stmt->bindValue(":idUser", $wishProductObj->idUser);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
        	throw $e;
            //echo $e->getMessage();
        }
    }

    public static function update($wishProductObj)
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE wishproduct SET
									description = :description,
									quantity = :quantity,
									idUser = :idUser
								  WHERE idWishProduct = :idWishProduct");
            
            $stmt->bindValue(":quantity", $wishProductObj->quantity);
            $stmt->bindValue(":description", $wishProductObj->description);
            $stmt->bindValue(":idUser", $wishProductObj->idUser);
			$stmt->bindValue(":idWishProduct", $wishProductObj->idWishProduct);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
        	throw $e;
         //  echo $e->getMessage();
        }
    }

    public static function delete($idWishProduct)
    {
		$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM wishproduct WHERE idWishProduct = :idWishProduct");

            $stmt->bindValue(":idWishProduct", $idWishProduct);       
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
            $stmt = $pdo->prepare("SELECT * FROM wishproduct");          
            $stmt->execute();

            $wishProductsColumns = $stmt->fetchAll();
            
            $wishProductObjArray = array();
            
            foreach ($wishProductsColumns as $wishProductCol)
            {
                $wishProductObjArray[] =  new WishProduct($wishProductCol['quantity'],
														  $wishProductCol['description'],
														  $wishProductCol['idUser'],
														  $wishProductCol['idWishProduct']);
            }
            
            return $wishProductObjArray;
        }
        
        catch(PDOException $e) 
        {
        	throw $e;
           // echo $e->getMessage();
        }
    }
}