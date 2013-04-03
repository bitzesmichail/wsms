<?php
 
require_once("Model.php");
require_once("entities/Role.php");
require_once("entities/Connector.php");

class RoleModel extends Model
{
    public function __construct()
    {
        
    }
    
   public static function create($role) 
    {
        $pdo = Connector::getPDO();

        try
        {
            $stmt = $pdo->prepare("INSERT INTO Role
                                    (type, description)
                                   VALUES
                                    (:type, :description)");

            $stmt->bindValue(":type", $role->type);
            $stmt->bindValue(":description", $role->description);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function update($role)
    {
        $pdo = Connector::getPDO();
    
        try
        {
            $stmt = $pdo->prepare("UPDATE Role SET type = :type, description = :description WHERE idRole = :idRole");
            
            $stmt->bindValue(":type", $role->type);
            $stmt->bindValue(":description", $role->description);
            $stmt->bindValue(":idRole", $role->idRole);
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

            $rolesColumns = $stmt->fetchAll();       //place null instead of 'roles' cause it will put roles instead of null 
            
            $roles = array();
            
            foreach ($rolesColumns as $roleCol)
            {
                $roles[] =  new Role($roleCol['type'], $roleCol['description'], $roleCol['idRole']);     
            }
            
            return $roles;
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

            $stmt->bindParam(":idRole", $idRole);
            $stmt->execute();
            
            $roleCol = $stmt->fetch(FETCH_ASSOC);
            
            return new Role($roleCol['type'], $roleCol['description'], $roleCol['idRole']);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}