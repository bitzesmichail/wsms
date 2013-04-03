<?php
 
class Role
{
    
    private $idRole;
    private $type;
    private $description;
    
    public function __construct($type, $description, $idRole = null)
    {
	if($type == null || $description == null)
	{
	    die("Both arguments must be non-null");
	}
	
	$this->idRole = $idRole;
	$this->type = $type;
	$this->description = $description;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idRole":
		return $this->idRole;	    
	    case "type":
		return $this->type;
	    case "description":
		return $this->description;
	}
    }
    
    public function __set($name, $value)
    {
	switch ($name)
	{
	    case "idRole":
    		$this->idRole = $idRole;
		break;
	    case "type":
		if ( $value != null )
		{
		    $this->type = $value;
		}
		break;
	    case "description":
		if ( $value != null )
		{
		    $this->description = $value;
		}
		break;
	}
    }
    
    public static function isNull($param)
    {
	if ( $param == null )
	{
	    return true;
	}
	return false;
    }
}