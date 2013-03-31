<?php
 
class Provider 
{
    
    private $provider;
    
    public function __construct($provider)
    {
	$this->provider = $provider;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idProvider":
		return $this->provider['idProvider'];
	    case "name":
		return $this->provider['name'];
	    case "surname":
		return $this->provider['surname'];
	    case "ssn":
		return $this->provider['ssn'];
	    case "phone":
		return $this->provider['phone'];
	    case "cellphone":
		return $this->provider['cellphone'];
	    case "email":
		return $this->provider['email'];
	    case "address":
		return $this->provider['address'];
	    case "zipcode":
		return $this->provider['zipcode'];
	    case "city":
		return $this->provider['city'];
	}
    }

}