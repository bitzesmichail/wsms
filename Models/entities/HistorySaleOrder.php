<?php
 
class HistorySaleOrder 
{
	private $idHistorySaleOrder;
    private $idSaleOrder;
    private $dateUpdated;
	private $dateCreated;
	private $dateClosed;
	private $dateDue;
	private $customerSsn;
	private $status;
	private $products;
	private $address;
	private $income;
	private $outcome;
	private $amountDiscount;
	
    public function __construct($idHistorySaleOrder, 
								$idSaleOrder, 
								$dateUpdated, 
								$dateCreated,
    							$dateClosed,
    							$dateDue,
    							$customerSsn,
    							$status,
								$middleProductObjArray,
								$address,
								$income, 
								$outcome,
								$amountDiscount)
    {
		$this->idHistorySaleOrder = $idHistorySaleOrder;
		$this->idSaleOrder = $idSaleOrder;
		$this->dateCreated = $dateCreated;
		$this->dateUpdated = $dateUpdated;		
		$this->dateDue = $dateDue;
		$this->customerSsn = $customerSsn;
		$this->status = $status;
		$this->dateClosed = $dateClosed;
		$this->products = $middleProductObjArray;
		$this->address = $address;
		$this->income = $income;
		$this->outcome = $outcome;
		$this->amountDiscount = $amountDiscount;
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
			case "idHistorySaleOrder":
				return $this->idHistorySaleOrder;	
			case "status":
				return $this->status;
			case "products":	
				return $this->products;
			case "address":
				return $this->address;
			case "income":
				return $this->income;
			case "outcome":
				return $this->outcome;
			case "amountDiscount":
				return $this->amountDiscount;
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
			case "idHistorySaleOrder":
				$this->idHistorySaleOrder = $value;
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
			case "income":
				$this->income = $value;
				break;
			case "outcome":
				$this->outcome = $value;
				break;
			case "amountDiscount":
				$this->amountDiscount = $value;
				break;
								
		}
    }
}