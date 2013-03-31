<?php
 
class Role
{
    
    private $role;
    
    public function __construct($role)
    {
	$this->role = $role;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idRole":
		return $this->role['idRole'];	    
	    case "type":
		return $this->role['type'];
	    case "description":
		return $this->role['description'];
	}
    }

}