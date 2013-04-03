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

            $usersColumns = $stmt->fetchAll();       //place null instead of 'roles' cause it will put roles instead of null 
            
            $users = array();
            
            foreach ($usersColumns as $userCol)
            {
                $users[] =  new User($userCol['username'], $userCol['password'], $userCol['email'], null, $userCol['idUser']);     
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

            $stmt->bindParam(":idUser", $idUser);
            $stmt->execute();
            
            $userCol = $stmt->fetch(FETCH_ASSOC);
            
            return new User($userCol['username'], $userArray['password'], $userArray['email'], null, $userArray['idUser']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}