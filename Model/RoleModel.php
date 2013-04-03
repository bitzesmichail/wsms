<?php
 
require_once("Model.php");

class RoleModel extends Model
{
    
    public function __construct()
    {
        // parent::__construct();
        // echo "RoleModel Constructor";
    }

    public function create($role)
    {
	//returns message success/fail
    }

    public function update()
    {
	//returns message success/fail
    }
    
    public function delete()
    {
	//returns message success/fail
    }
    
    public function getRoles()
    {
        //returns array of object getRoles
        return array(0);
    }
	
}