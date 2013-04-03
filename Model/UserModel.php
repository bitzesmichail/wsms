<?php
 
require_once("Model.php");
require_once("entities/User.php");
require_once("entities/Connector.php");

class UserModel extends Model
{
    public function __construct()
    {
        //echo "UserModel Constructor<br />";
    }

    public function create($user) 
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

    public function update($user)
    {
        try
        {
            $stmt = $pdo->prepare("UPDATE User
                SET username = :username,
                password = :password,
                email = :email
                WHERE idUser = :idUser");
            $stmt->bindValue(":username", $user->username);
            $stmt->bindValue(":password", $user->password);
            $stmt->bindValue(":email", $user->email);
            $stmt->bindValue(":idUser", $user->idUser);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($idUser)
    {
        $pdo = Connector::getPDO();
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM User
                      WHERE idUser = :idUser");

            $stmt->bindValue(":idUser", $idUser);       
            $stmt->execute();

        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public function getUserRoles($idUser)
    {

    }

    public function getUsers() 
    {
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM User");

            $stmt->bindParam(":username", $username);               
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_CLASS, "User"); 

            return $users;
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function getUserById($idUser='')
    {
        # code...
    }
}