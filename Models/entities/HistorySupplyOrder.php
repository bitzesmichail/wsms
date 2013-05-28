<?php
 
class HistorySupplyOrder 
{
	private $idHistorySupplyOrder;
    private $idSupplyOrder;
    private $dateUpdated;
	private $dateCreated;
	private $dateClosed;
	private $dateDue;
	private $providerSsn;
	private $products;
	private $outcome;
	
    public function __construct($idHistorySupplyOrder, 
								$idSupplyOrder, 
								$dateUpdated, 
								$dateCreated,
    							$dateClosed,
    							$dateDue,
    							$providerSsn,
								$middleProductObjArray, 
								$outcome)
    {
		$this->idHistorySupplyOrder = $idHistorySupplyOrder;
		$this->idSupplyOrder = $idSupplyOrder;
		$this->dateCreated = $dateCreated;
		$this->dateUpdated = $dateUpdated;		
		$this->dateDue = $dateDue;
		$this->providerSsn = $providerSsn;
		$this->dateClosed = $dateClosed;
		$this->products = $middleProductObjArray;
		$this->outcome = $outcome;
    }
    
    public function __get($param)
    {
		switch ($param)
		{
			case "idSupplyOrder":
				return $this->idSupplyOrder;
			case "dateCreated":
				return $this->dateCreated;
			case "dateUpdated":
				return $this->dateUpdated;				
			case "dateClosed":
				return $this->dateClosed;
			case "dateDue":
				return $this->dateDue;
			case "providerSsn":
				return $this->providerSsn;
			case "idHistorySupplyOrder":
				return $this->idHistorySupplyOrder;	
			case "products":	
				return $this->products;
			case "outcome":
				return $this->outcome;
		}
    }
	
	public function __set($name, $value)
    {
		switch ($name)
		{
			case "idSupplyOrder":
				$this->idSupplyOrder = $value;
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
			case "providerSsn":
				$this->providerSsn = $value;
				break;	 	    
			case "idHistorySupplyOrder":
				$this->idHistorySupplyOrder = $value;
				break;	
			case "products":
				$this->products = $value;
				break;
			case "outcome":
				$this->outcome = $value;
				break;
								
		}
    }
}