<?php
 
class User
{   
    private $idUser;
    private $username;
    private $password;
    private $email;
    private $role;
    
    public function __construct($username, $password, $email, $role, $idUser)
    {
    	if ( !self::isValidUsername($username) )
		{
			die("username can't be empty");
		}

		if ( !self::isValidPassword($password) )
		{
			die("password must be at least 6 chars long");
		}

		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->idUser = $idUser;
		$this->role = $role;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idUser":
		return $this->idUser;	    
	    case "username":
		return $this->username;
	    case "password":
		return $this->password;
	    case "email":
		return $this->email;
	    case "role":
		return $this->role;
	}
    }

    public function __set($name, $value)
    {
	switch ($name)
	{
	    case "idUser":
    		$this->idUser = $value;
		break;
	    case "username":
		if ( self::isValidUsername($value) )
		{
		    $this->username = $value;
		}
		break;
	    case "password":
		if ( self::isValidPassword($value) )
		{
		    $this->password = $value;
		}
		break;
	    case "email":
		$this->email = $value;
		break;
	    case "role":
		$this->role = $value;
		break;
	}
    }

    public static function isValidUsername($username)
    {
	if ( $username == null || $username == "" )
	{
	    return false;
	}
	return true;
    }

    public static function isValidPassword($password)
    {
	if ($password == null || strlen($password) < 6)
	{
	   return false;
	}
	return true;
    }
}