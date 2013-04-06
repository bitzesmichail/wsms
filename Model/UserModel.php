<?php
 
require_once("Model.php");
require_once("entities/User.php");
require_once("entities/Connector.php");

class UserModel extends Model
{
    public function __construct()
    {
        
    }

    public static function create($userObj) 
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("INSERT INTO User
                                    (username, password, email)
                                   VALUES
                                    (:username, :password, :email)");

            $stmt->bindValue(":username", $userObj->username);
            $stmt->bindValue(":password", $userObj->password);
            $stmt->bindValue(":email", $userObj->email);
            $stmt->execute();
            
            $idUser = $pdo->lastInsertId(); 
            
            foreach ($userObj->roles as $roleObj)
            {
                $stmt = $pdo->prepare("SELECT idRole 
                                      FROM Role
                                      WHERE type = :type");
    
                $stmt->bindValue(":type", $roleObj->type);
                $stmt->execute();
                
                $roleCol = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $stmt = $pdo->prepare("INSERT INTO UserHasRole
                                       (idUser, idRole)
                                      VALUES
                                       (:idUser, :idRole)");
    
                $stmt->bindValue(":idUser", $idUser);
                $stmt->bindValue(":idRole", $roleCol['idRole']);
                $stmt->execute();
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function update($userObj)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("UPDATE User SET
                                    username = :username,
                                    password = :password,
                                    email = :email
                                  WHERE idUser = :idUser");
            
            $stmt->bindValue(":username", $userObj->username);
            $stmt->bindValue(":password", $userObj->password);
            $stmt->bindValue(":email", $userObj->email);
            $stmt->bindValue(":idUser", $userObj->idUser);
            $stmt->execute();
            return 0;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function delete($idUser)
    {
        $pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM User WHERE idUser = :idUser");

            $stmt->bindValue(":idUser", $idUser);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getUsers() 
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM User");          
            $stmt->execute();

            $usersColumns = $stmt->fetchAll();
            
            $userObjArray = array();
            
            foreach ($usersColumns as $userCol)
            {
                
                $stmt = $pdo->prepare("SELECT type, description
                                      FROM Role, UserHasRole
                                      WHERE UserHasRole.idUser = :idUser
                                      AND UserHasRole.idRole = Role.idRole");  
                
                $stmt->bindValue(":idUser", $userCol['idUser']);
                $stmt->execute();
                
                $rolesColumns = $stmt->fetchAll();
                
                $roleObjArray = array();
                
                foreach ($rolesColumns as $roleCol)
                {
                    $roleObjArray[] = new Role($roleCol['type'], $roleCol['description']);
                }
                
               // echo "<pre>"; print_r($roles); echo "</pre>";
                $userObjArray[] =  new User($userCol['username'],
                                            $userCol['password'],
                                            $userCol['email'],
                                            $roleObjArray,
                                            $userCol['idUser']);     
            }
            
            return $userObjArray;
        }
        
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getUserById($idUser)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT *
                                  FROM User
                                  WHERE idUser = :idUser");

            $stmt->bindValue(":idUser", $idUser);
            $stmt->execute();
            
            $userCol = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $stmt = $pdo->prepare("SELECT type, description
                                  FROM Role, UserHasRole
                                  WHERE UserHasRole.idUser = :idUser
                                  AND UserHasRole.idRole = Role.idRole");  
            
            $stmt->bindValue(":idUser", $idUser);
            $stmt->execute();
            
            $rolesColumns = $stmt->fetchAll();
            
            $roleObjArray = array();
            
            foreach ($rolesColumns as $roleCol)
            {
                $roleObjArray[] = new Role($roleCol['type'], $roleCol['description']);
            }
                
            return new User($userCol['username'],
                            $userCol['password'],
                            $userCol['email'],
                            $roleObjArray,
                            $userCol['idUser']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public static function getUserByUsername($username)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT *
                                  FROM User
                                  WHERE username = :username");

            $stmt->bindValue(":username", $username);
            $stmt->execute();
            
            $userCol = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $stmt = $pdo->prepare("SELECT type, description
                                  FROM Role, UserHasRole
                                  WHERE UserHasRole.idUser = :idUser
                                  AND UserHasRole.idRole = Role.idRole");  
            
            $stmt->bindValue(":idUser", $userCol['idUser']);
            $stmt->execute();
            
            $rolesColumns = $stmt->fetchAll();
            
            $roleObjArray = array();
            
            foreach ($rolesColumns as $roleCol)
            {
                $roleObjArray[] = new Role($roleCol['type'], $roleCol['description']);
            }
                
            return new User($userCol['username'],
                            $userCol['password'],
                            $userCol['email'],
                            $roleObjArray,
                            $userCol['idUser']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}