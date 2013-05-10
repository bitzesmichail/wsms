<?php

require_once 'Model.php';
require_once("entities/Provider.php");
require_once("entities/Connector.php");

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
			throw $e;
            //echo $e->getMessage();
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
									phone = :phone,
									cellphone = :cellphone,
									email = :email,
									address = :address,
									city = :city,
									zipCode = :zipCode
								  WHERE ssn = :providerSsn");
	
			$stmt->bindValue(":name", $providerObj->name);			    
            $stmt->bindValue(":surname", $providerObj->surname);
            $stmt->bindValue(":providerSsn", $providerObj->ssn);
            $stmt->bindValue(":phone", $providerObj->phone);
			$stmt->bindValue(":cellphone", $providerObj->cellphone);
            $stmt->bindValue(":email", $providerObj->email);
            $stmt->bindValue(":address", $providerObj->address);
			$stmt->bindValue(":city", $providerObj->city);
            $stmt->bindValue(":zipCode", $providerObj->zipCode);
            $stmt->execute();
		}
        catch (PDOException $e)
        {
			throw $e;
            //echo $e->getMessage();
        }	
    }

    public static function delete($providerSsn)
    {
	$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM Provider WHERE ssn = :providerSsn");
            $stmt->bindValue(":providerSsn", $providerSsn);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
			throw $e;	
            //echo $e->getMessage();
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
													$providerCol['zipCode']);
            }
            
            return $providerObjArray;
        }
        catch(PDOException $e) 
        {
			throw $e;
            //echo $e->getMessage();
        }
    }
}