<?php
 
require_once("Model.php");
require_once("entities/User.php");
require_once("entities/Connector.php");

class UserModel extends Model
{
    public function __construct()
    {
        
    }

    public static function create($user) 
    {
        $pdo = Connector::getPDO();
        //Check if roles is null or not. 
        try
        {
            $stmt = $pdo->prepare("INSERT INTO User
                                    (username, password, email)
                                   VALUES
                                    (:username, :password, :email)");

            $stmt->bindValue(":username", $user->username);
            $stmt->bindValue(":password", $user->password);
            $stmt->bindValue(":email", $user->email);
            $stmt->execute();
            
            $idUser = $pdo->lastInsertId(); 
            
            foreach ($user->roles as $roleType)
            {
                $stmt = $pdo->prepare("SELECT idRole 
                                      FROM Role
                                      WHERE type = :type");
    
                $stmt->bindValue(":type", $roleType);
                $stmt->execute();
                
                $role = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $stmt = $pdo->prepare("INSERT INTO UserHasRole
                                       (idUser, idRole)
                                      VALUES
                                       (:idUser, :idRole)");
    
                $stmt->bindValue(":idUser", $idUser);
                $stmt->bindValue(":idRole", $role['idRole']);
                $stmt->execute();
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function update($user)
    {
        $pdo = Connector::getPDO();
        //print_r($user);
        try
        {
            $stmt = $pdo->prepare("UPDATE User SET username = :username, password = :password, email = :email WHERE idUser = :idUser");
            
            $stmt->bindValue(":username", $user->username);
            $stmt->bindValue(":password", $user->password);
            $stmt->bindValue(":email", $user->email);
            $stmt->bindValue(":idUser", $user->idUser);
            echo $stmt->execute();
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
            
            $users = array();
            
            foreach ($usersColumns as $userCol)
            {
                
                $stmt = $pdo->prepare("SELECT type
                                      FROM Role, UserHasRole
                                      WHERE UserHasRole.idUser = :idUser
                                      AND UserHasRole.idRole = Role.idRole");   
                
                $stmt->bindValue(":idUser", $userCol['idUser']);
                $stmt->execute();
                
                $rolesArray = $stmt->fetchAll();
                
                $roles = array();
                
                foreach ($rolesArray as $roleRow)
                {
                    $roles[] = $roleRow[0];
                }
                
               // echo "<pre>"; print_r($roles); echo "</pre>";
                $users[] =  new User($userCol['username'], $userCol['password'], $userCol['email'], $roles, $userCol['idUser']);     
            }
            
            return $users;
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
            
            return new User($userCol['username'], $userCol['password'], $userCol['email'], null, $userCol['idUser']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}