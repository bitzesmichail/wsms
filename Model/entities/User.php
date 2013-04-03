<?php
 
class User
{   
    private $idUser = 0;
    private $username = '';
    private $password = '';
    private $email = '';
    private $roles = array();
    
    public function __construct($username, $password, $email = null, $roles = null, $idUser = null)
    {
    	if ( !User::isValidUsername($username) )
		{
			die("username can't be empty");
		}

		if ( !User::isValidPassword($password) )
		{
			die("password must be at least 6 chars long");
		}

		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->idUser = $idUser;
		$this->roles = $roles;
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
		    case "roles":
				return $this->roles;
		}
	}

	public function __set($name, $value)
    {
		switch ($name)
		{
			case "idUser":
				$this->idUser = $value;
			case "username":
				if ( isValidUsername($value) )
				{
				    $this->username = $value;
				}
			case "password":
				if ( isValidPassword($value) )
				{
				    $this->password = $value;
				}
			case "email":
				$this->email = $value;
			case "roles":
				$this->roles = $value;
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