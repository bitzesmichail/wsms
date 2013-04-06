<?php
 
require_once("Model.php");

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
            $stmt = $pdo->prepare("INSERT INTO Customer
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
            echo $e->getMessage();
        }
    }

    public static function update($customerObj)
    {
	$pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("UPDATE Customer SET
				    name = :name,
				    surname = :surname,
				    ssn = :ssn,
				    phone = :phone,
				    cellphone = :cellphone,
				    email = :email,
				    address = :address,
				    city = :city,
				    zipCode = :zipCode
				  WHERE idCustomer = :idCustomer");
	
	    $stmt->bindValue(":name", $customerObj->name);			    
            $stmt->bindValue(":surname", $customerObj->surname);
            $stmt->bindValue(":ssn", $customerObj->ssn);
            $stmt->bindValue(":phone", $customerObj->phone);
	    $stmt->bindValue(":cellphone", $customerObj->cellphone);
            $stmt->bindValue(":email", $customerObj->email);
            $stmt->bindValue(":address", $customerObj->address);
	    $stmt->bindValue(":city", $customerObj->city);
            $stmt->bindValue(":zipCode", $customerObj->zipCode);
	    $stmt->bindValue(":idCustomer", $customerObj->idCustomer);
            $stmt->execute();
	    return 0;
	}
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function delete($idCustomer)
    {
	$pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM Customer WHERE idCustomer = :idCustomer");

            $stmt->bindValue(":idCustomer", $idCustomer);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getCustomers()
    {
	$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM Customer");          
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
						    $customerCol['zipCode'],
						    $customerCol['idCustomer']);
            }
            
            return $customerObjArray;
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public static function getCustomerById($idCustomer)
    {
	$pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT *
                                  FROM Customer
                                  WHERE idCustomer = :idCustomer");

            $stmt->bindValue(":idCustomer", $idCustomer);
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
				$customerCol['zipCode'],
			        $idCustomer);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public static function setDiscount($idCustomer, $idProduct, $discount)
    {
	if($discount > 1)
	{
	    return -1;
	}
	
	$pdo = Connector::getPDO();
	
	try
        {
            $stmt = $pdo->prepare("INSERT INTO CustomerHasDiscount
				    (idCustomer, idProduct, discount)
				   VALUES
				    (:idCustomer, :idProduct, :discount)
				   ON DUPLICATE KEY UPDATE
				    discount = :discount");

            $stmt->bindValue(":idCustomer", $idCustomer);
	    $stmt->bindValue(":idProduct", $idProduct);
	    $stmt->bindValue(":discount", $discount);
            $stmt->execute();
	        
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public static function getDiscount($idCustomer, $idProduct)
    {
	$pdo = Connector::getPDO();
	
	try
        {
            $stmt = $pdo->prepare("SELECT discount
				  FROM CustomerHasDiscount
				  WHERE idCustomer = :idCustomer
				  AND idProduct = :idProduct");

            $stmt->bindValue(":idCustomer", $idCustomer);
	    $stmt->bindValue(":idProduct", $idProduct);
            $stmt->execute();
	        
	    $discountCol = $stmt->fetch(PDO::FETCH_ASSOC);
	    
	    return $discountCol['discount'];
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}