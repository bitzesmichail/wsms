<?php
 
require_once("Model.php");
require_once("entities/Role.php");
require_once("entities/Connector.php");

class RoleModel extends Model
{
    public function __construct()
    {
        
    }
    
   public static function create($roleObj) 
    {
        $pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO Role
                                    (type, description)
                                   VALUES
                                    (:type, :description)");

            $stmt->bindValue(":type", $roleObj->type);
            $stmt->bindValue(":description", $roleObj->description);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function update($roleObj)
    {
        $pdo = Connector::getPDO();
    
        try
        {
            $stmt = $pdo->prepare("UPDATE Role SET type = :type, description = :description WHERE idRole = :idRole");
            
            $stmt->bindValue(":type", $roleObj->type);
            $stmt->bindValue(":description", $roleObj->description);
            $stmt->bindValue(":idRole", $roleObj->idRole);
            echo $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function delete($idRole)
    {
        $pdo = Connector::getPDO();
        
        try 
        {
            $stmt = $pdo->prepare("DELETE FROM Role WHERE idRole = :idRole");

            $stmt->bindValue(":idRole", $idRole);       
            $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getRoles() 
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT * FROM Role");          
            $stmt->execute();

            $rolesColumns = $stmt->fetchAll();       
            
            $roleObjArray = array();
            
            foreach ($rolesColumns as $roleCol)
            {
                $roleObjArray[] =  new Role($roleCol['type'], $roleCol['description'], $roleCol['idRole']);     
            }
            
            return $roleObjArray;
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function getRoleById($idRole)
    {
        $pdo = Connector::getPDO();
        
        try
        {
            $stmt = $pdo->prepare("SELECT *
                                  FROM Role
                                  WHERE idRole = :idRole");

            $stmt->bindValue(":idRole", $idRole);
            $stmt->execute();
	    
            $roleCol = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Role($roleCol['type'], $roleCol['description'], $roleCol['idRole']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}