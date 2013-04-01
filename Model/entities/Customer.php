<?php
 
class Customer
{
    
    private $customer;
    
    public function __construct($customer)
    {
	$this->customer = $customer;
    }
    
    public function __get($param)
    {
		switch ($param)
		{    
			case "idCustomer":
			return $this->customer['idCustomer'];
			case "name":
			return $this->customer['name'];
			case "surname":
			return $this->customer['surname'];
			case "ssn":
			return $this->customer['ssn'];
			case "phone":
			return $this->customer['phone'];
			case "cellphone":
			return $this->customer['cellphone'];
			case "email":
			return $this->customer['email'];
			case "address":
			return $this->customer['address'];
			case "zipcode":
			return $this->customer['zipcode'];
			case "city":
			return $this->customer['city'];
		}
    }

}