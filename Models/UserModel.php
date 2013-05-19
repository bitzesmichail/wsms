<?php

require_once("Model.php");
require_once("entities/User.php");
require_once("entities/Connector.php");

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function create($userObj) 
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("INSERT INTO user
                                    (username, password, email,role)
                                   VALUES
                                    (:username, :password, :email, :role)");

            $stmt->bindValue(":username", $userObj->username);
            $stmt->bindValue(":password", $userObj->password);
            $stmt->bindValue(":email", $userObj->email);
            $stmt->bindValue(":role", $userObj->role);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
			throw $e;
         //   echo $e->getMessage();
        }
    }

    public static function update($userObj)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("UPDATE user SET
                                    username = :username,
                                    password = :password,
                                    email = :email,
									role = :role
                                  WHERE idUser = :idUser");
            
            $stmt->bindValue(":username", $userObj->username);
            $stmt->bindValue(":password", $userObj->password);
            $stmt->bindValue(":email", $userObj->email);
			$stmt->bindValue(":role", $userObj->role);
            $stmt->bindValue(":idUser", $userObj->idUser);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
        	throw $e;
         //   echo $e->getMessage();
        }
    }

    public static function delete($idUser)
    {
        $pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM user WHERE idUser = :idUser");

            $stmt->bindValue(":idUser", $idUser);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
        	throw $e;
          //  echo $e->getMessage();
        }
    }

    public static function getUsers() 
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM user");          
            $stmt->execute();

            $usersColumns = $stmt->fetchAll();
            
            $userObjArray = array();
            
            foreach ($usersColumns as $userCol)
            {

                $userObjArray[] =  new User($userCol['username'],
                                            $userCol['password'],
                                            $userCol['email'],
                                            $userCol['role'],
                                            $userCol['idUser']);     
            }
            
            return $userObjArray;
        }
        
        catch(PDOException $e) 
        {
        	throw $e;
        //    echo $e->getMessage();
        }
    }

    public static function getUserById($idUser)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE idUser = :idUser");

            $stmt->bindValue(":idUser", $idUser);
            $stmt->execute();
            
            $userCol = $stmt->fetch(PDO::FETCH_ASSOC);
            
                
            return new User($userCol['username'],
                            $userCol['password'],
                            $userCol['email'],
                            $userCol['role'],
                            $userCol['idUser']);
        }
        catch(PDOException $e) 
        {
        	throw $e;
      //      echo $e->getMessage();
        }
    }
    
    public static function getUserByUsername($username)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");

            $stmt->bindValue(":username", $username);
            $stmt->execute();
            
            $userCol = $stmt->fetch(PDO::FETCH_ASSOC);
            
			if($userCol == null) 
			{
				return null;
			}
			
            return new User($userCol['username'],
							$userCol['password'],
							$userCol['email'],
							$userCol['role'],
							$userCol['idUser']);
            
        }
        catch(PDOException $e) 
        {
			throw $e;
            //echo $e->getMessage();
        }
    }
}
