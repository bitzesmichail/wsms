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
            $stmt = $pdo->prepare('INSERT INTO User (username, password, email) VALUES (:username, :password, :email)');
    	    
    	    $stmt->bindValue(':username', $user->username);
    	    $stmt->bindValue(':password', $user->password);
    	    $stmt->bindValue(':email', $user->email);
    	    $stmt->execute();
    	}
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function update()
    {
	
    }
    
    public function delete()
    {
        
    }
    
    public function getUserRoles($username)
    {
	
    }

    public function getUsers() 
    {
	
    }

}
