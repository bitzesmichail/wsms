<?php
 
class Customer
{
    private $name;
    private $surname;
    private $ssn;
    private $phone;
    private $cellphone;
    private $email;
    private $address;
    private $city;
    private $zipCode;
    
    public function __construct($name,
								$surname,
								$ssn,
    							$phone,
    							$cellphone,
    							$email,
								$address,
								$city,
								$zipCode)
    {
		$this->name = $name;
		$this->surname = $surname;
		$this->ssn = $ssn;
		$this->phone = $phone;
		$this->cellphone = $cellphone;
		$this->email = $email;
		$this->address = $address;
		$this->city = $city;
		$this->zipCode = $zipCode;
    }
    
    public function __get($param)
    {
		switch ($param)
		{    
			case "name":
				return $this->name;
			case "surname":
				return $this->surname;
			case "ssn":
				return $this->ssn;
			case "phone":
				return $this->phone;
			case "cellphone":
				return $this->cellphone;
			case "email":
				return $this->email;
			case "address":
				return $this->address;
			case "zipCode":
				return $this->zipCode;
			case "city":
				return $this->city;
		}
    }
    
    public function __set($name, $value)
    {
		switch ($name)
		{
			case "name":
				$this->name = $value;
				break;
			case "surname":
				$this->surname = $value;
				break;
			case "ssn":
				$this->ssn = $value;
				break;
			case "phone":
				$this->phone = $value;
				break;
			case "cellphone":
				$this->cellphone = $value;
				break;
			case "email":
				$this->email = $value;
				break;	 	    
			case "address":
				$this->address = $value;
				break;
			case "zipCode":
				$this->zipCode = $value;
				break;
			case "city":
				$this->city = $value;
				break; 	 
		}
    }
}