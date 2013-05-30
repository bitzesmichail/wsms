<?php
 
class SaleOrder 
{
    private $idSaleOrder;
    private $dateUpdated;
	private $dateCreated;
	private $dateClosed;
	private $dateDue;
	private $customerSsn;
	private $idUser;
	private $status;
	private $products;
	private $address;
	private $username;
	
    public function __construct($dateDue, 
								$customerSsn, 
								$idUser, 
								$status,
								$middleProductObjArray,
								$dateCreated = null,
								$idSaleOrder = null, 
								$dateUpdated = null,
								$dateClosed = null,
    							$address = null,
    							$username = null)
    {
		date_default_timezone_set('Europe/Athens');
		
		if($dateCreated == null) 
		{
			$dateCreated = date('Y-m-d H:i:s');
			
		}
		
		if($dateUpdated == null) 
		{
			$dateUpdated = $dateCreated;
		}
		
		$this->dateCreated = $dateCreated;
		$this->dateUpdated = $dateUpdated;
		
		$this->idSaleOrder = $idSaleOrder;
		$this->dateDue = $dateDue;
		$this->customerSsn = $customerSsn;
		$this->idUser = $idUser;
		$this->status = $status;
		$this->dateClosed = $dateClosed;
		$this->products = $middleProductObjArray;
		$this->address = $address;
		$this->username = $username;
    }
    
    public function __get($param)
    {
		switch ($param)
		{
			case "idSaleOrder":
				return $this->idSaleOrder;
			case "dateCreated":
				return $this->dateCreated;
			case "dateUpdated":
				return $this->dateUpdated;				
			case "dateClosed":
				return $this->dateClosed;
			case "dateDue":
				return $this->dateDue;
			case "customerSsn":
				return $this->customerSsn;
			case "idUser":
				return $this->idUser;	case "username":
    			$this->username = $value;
    			break;
			case "status":
				return $this->status;
			case "products":	
				return $this->products;
			case "address":
				return $this->address;
			case "username":
				return $this->username;
		}
    }
	
	public function __set($name, $value)
    {
		switch ($name)
		{
			case "idSaleOrder":
				$this->idSaleOrder = $value;
				break;
			case "dateCreated":
				$this->dateCreated = $value;
				break;
			case "dateUpdated":
				$this->dateUpdated = $value;
				break;
			case "dateClosed":
				$this->dateClosed = $value;
				break;
			case "dateDue":
				$this->dateDue = $value;
				break;
			case "customerSsn":
				$this->customerSsn = $value;
				break;	 	    
			case "idUser":
				$this->idUser = $value;
				break;
			case "status":
				$this->status = $value;
				break;	
			case "products":
				$this->products = $value;
				break;
			case "address":
				$this->address = $value;
				break;
			case "username":
				$this->username = $value;
				break;
								
		}
    }
}