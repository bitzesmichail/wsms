<?php
 
class User
{
    
    private $user;
    
    public function __construct($user)
    {
	$this->user = $user;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idUser":
		return $this->user['idUser'];	    
	    case "username":
		return $this->user['username'];
	    case "password":
		return $this->user['password'];
	    case "email":
		return $this->user['email'];
	}
    }

}
