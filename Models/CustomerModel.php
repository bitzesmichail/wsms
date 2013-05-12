<?php
 
require_once("Model.php");
require_once("entities/Customer.php");
require_once("entities/Connector.php");

class CustomerModel extends Model
{
    
    public function __construct()  
    {
        
    }
    
    public static function create($customerObj)  
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO customer
                                    (name, surname, ssn, phone, cellphone, email, address, city, zipCode)
                                   VALUES
                                    (:name, :surname, :ssn, :phone, :cellphone, :email, :address, :city, :zipCode)");

			$stmt->bindValue(":name", $customerObj->name);			    
            $stmt->bindValue(":surname", $customerObj->surname);
            $stmt->bindValue(":ssn", $customerObj->ssn);
            $stmt->bindValue(":phone", $customerObj->phone);
			$stmt->bindValue(":cellphone", $customerObj->cellphone);
            $stmt->bindValue(":email", $customerObj->email);
            $stmt->bindValue(":address", $customerObj->address);
			$stmt->bindValue(":city", $customerObj->city);
            $stmt->bindValue(":zipCode", $customerObj->zipCode);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
			throw $e;
            //echo $e->getMessage();
        }
    }

    public static function update($customerObj)
    {
		$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE customer SET
									name = :name,
									surname = :surname,
									phone = :phone,
									cellphone = :cellphone,
									email = :email,
									address = :address,
									city = :city,
									zipCode = :zipCode
								  WHERE ssn = :customerSsn");
	
			$stmt->bindValue(":name", $customerObj->name);			    
            $stmt->bindValue(":surname", $customerObj->surname);
            $stmt->bindValue(":customerSsn", $customerObj->ssn);
            $stmt->bindValue(":phone", $customerObj->phone);
			$stmt->bindValue(":cellphone", $customerObj->cellphone);
            $stmt->bindValue(":email", $customerObj->email);
            $stmt->bindValue(":address", $customerObj->address);
			$stmt->bindValue(":city", $customerObj->city);
            $stmt->bindValue(":zipCode", $customerObj->zipCode);
            $stmt->execute();
		}
        catch (PDOException $e)
        {
			throw $e;
            //echo $e->getMessage();
        }
    }

    public static function delete($customerSsn)
    {
		$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM customer WHERE ssn = :customerSsn");
            $stmt->bindValue(":customerSsn", $customerSsn);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
			throw $e;
           // echo $e->getMessage();
        }
    }

    public static function getCustomers()
    {
		$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM customer");          
            $stmt->execute();

            $customersColumns = $stmt->fetchAll();
            
            $customerObjArray = array();
            
            foreach ($customersColumns as $customerCol)
            {
                $customerObjArray[] =  new Customer($customerCol['name'],
													$customerCol['surname'],
													$customerCol['ssn'],
													$customerCol['phone'],
													$customerCol['cellphone'],
													$customerCol['email'],
													$customerCol['address'],
													$customerCol['city'],
													$customerCol['zipCode']);
            }
            
            return $customerObjArray;
        }
        catch(PDOException $e) 
        {
			throw $e;
            //echo $e->getMessage();
        }
    }
    
    public static function getCustomerBySsn($customerSsn)
    {
		$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT *
                                  FROM customer
                                  WHERE ssn = :customerSsn");

            $stmt->bindValue(":customerSsn", $customerSsn);
            $stmt->execute();
	    
            $customerCol = $stmt->fetch(PDO::FETCH_ASSOC);
	    
			return new Customer($customerCol['name'],
								$customerCol['surname'],
								$customerCol['ssn'],
								$customerCol['phone'],
								$customerCol['cellphone'],
								$customerCol['email'],
								$customerCol['address'],
								$customerCol['city'],
								$customerCol['zipCode']);
        }
        catch(PDOException $e) 
        {
			throw $e;
            //echo $e->getMessage();
        }
    }
    
    public static function setDiscount($customerSsn, $productSku, $discount)
    {
		if($discount > 1)
		{
			throw new Exception("Discount value must be 0 < discount < 1");
		}
	
		$pdo = Connector::getPDO();
	
		try
        {
            $stmt = $pdo->prepare("INSERT INTO customer_has_discount
									(ssn, sku, discount)
								   VALUES
									(:customerSsn, :productSku, :discount)
								   ON DUPLICATE KEY UPDATE
									discount = :discount");

            $stmt->bindValue(":customerSsn", $customerSsn);
			$stmt->bindValue(":productSku", $productSku);
			$stmt->bindValue(":discount", $discount);
            $stmt->execute();
	        
        }
        catch(PDOException $e) 
        {	
			throw $e;
            //echo $e->getMessage();
        }
    }
    
    public static function getDiscount($customerSsn, $productSku)
    {
		$pdo = Connector::getPDO();
	
		try
        {
            $stmt = $pdo->prepare("SELECT discount
								  FROM customer_has_discount
								  WHERE ssn = :customerSsn
								  AND sku = :productSsn");

            $stmt->bindValue(":customerSsn", $customerSsn);
			$stmt->bindValue(":productSsn", $productSku);
            $stmt->execute();
	        
			$discount = $stmt->fetchColumn();
	    
			return $discount;
		}
        catch(PDOException $e) 
        {
			throw $e;
            //echo $e->getMessage();
        }
    }
    
    public static function removeDiscount($customerSsn, $productSku)
    {
    	$pdo = Connector::getPDO();
    
    	try
    	{
    		$stmt = $pdo->prepare("DELETE 
								  FROM customer_has_discount
								  WHERE ssn = :customerSsn
								  AND sku = :productSku");
    
    		$stmt->bindValue(":customerSsn", $customerSsn);
    		$stmt->bindValue(":productSku", $productSku);
    		$stmt->execute();
    	}
    	catch(PDOException $e)
    	{
			throw $e;
    		//echo $e->getMessage();
    	}
    }
}