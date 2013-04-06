<?php
 
require_once("Model.php");

class ProviderModel extends Model
{
    
    public function __construct()
    {
        
    }
    
    public static function create($providerObj)  
    {
	$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO Provider
                                    (name, surname, ssn, phone, cellphone, email, address, city, zipCode)
                                   VALUES
                                    (:name, :surname, :ssn, :phone, :cellphone, :email, :address, :city, :zipCode)");

	    $stmt->bindValue(":name", $providerObj->name);			    
            $stmt->bindValue(":surname", $providerObj->surname);
            $stmt->bindValue(":ssn", $providerObj->ssn);
            $stmt->bindValue(":phone", $providerObj->phone);
	    $stmt->bindValue(":cellphone", $providerObj->cellphone);
            $stmt->bindValue(":email", $providerObj->email);
            $stmt->bindValue(":address", $providerObj->address);
	    $stmt->bindValue(":city", $providerObj->city);
            $stmt->bindValue(":zipCode", $providerObj->zipCode);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function update($providerObj)
    {
	$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE Provider SET
				    name = :name,
				    surname = :surname,
				    ssn = :ssn,
				    phone = :phone,
				    cellphone = :cellphone,
				    email = :email,
				    address = :address,
				    city = :city,
				    zipCode = :zipCode
				  WHERE idProvider = :idProvider");
	
	    $stmt->bindValue(":name", $providerObj->name);			    
            $stmt->bindValue(":surname", $providerObj->surname);
            $stmt->bindValue(":ssn", $providerObj->ssn);
            $stmt->bindValue(":phone", $providerObj->phone);
	    $stmt->bindValue(":cellphone", $providerObj->cellphone);
            $stmt->bindValue(":email", $providerObj->email);
            $stmt->bindValue(":address", $providerObj->address);
	    $stmt->bindValue(":city", $providerObj->city);
            $stmt->bindValue(":zipCode", $providerObj->zipCode);
	    $stmt->bindValue(":idProvider", $providerObj->idProvider);
            $stmt->execute();
	    return 0;
	}
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }	
    }

    public static function delete($idProvider)
    {
	$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM Provider WHERE idProvider = :idProvider");

            $stmt->bindValue(":idProvider", $idProvider);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }		
    }

    public static function getProviders()
    {
	$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM Provider");          
            $stmt->execute();

            $providersColumns = $stmt->fetchAll();
            
            $providerObjArray = array();
            
            foreach ($providersColumns as $providerCol)
            {
                $providerObjArray[] =  new Provider($providerCol['name'],
						    $providerCol['surname'],
						    $providerCol['ssn'],
						    $providerCol['phone'],
						    $providerCol['cellphone'],
						    $providerCol['email'],
						    $providerCol['address'],
						    $providerCol['city'],
						    $providerCol['zipCode'],
						    $providerCol['idProvider']);
            }
            
            return $providerObjArray;
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}