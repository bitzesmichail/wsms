<?php
 
class SupplyOrder 
{
    private $idSupplyOrder;
    private $dateUpdated;
    private $dateCreated;
    private $dateClosed;
    private $dateDue;
    private $providerSsn;
    private $idUser;
    private $status;
    private $products;
    
    public function __construct($dateDue,
    		$providerSsn,
    		$idUser,
    		$status,
    		$middleProductObjArray,
    		$dateCreated ,
    		$idSupplyOrder ,
    		$dateUpdated = null,
    		$dateClosed = null)
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
    
    	$this->idSupplyOrder = $idSupplyOrder;
    	$this->dateDue = $dateDue;
    	$this->providerSsn = $providerSsn;
    	$this->idUser = $idUser;
    	$this->status = $status;
    	$this->dateClosed = $dateClosed;
    	$this->products = $middleProductObjArray;
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
    		case "idUser":
    			return $this->idUser;
    		case "status":
    			return $this->status;
    		case "products":
    			return $this->products;
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
    		case "idUser":
    			$this->idUser = $value;
    			break;
    		case "status":
    			$this->status = $value;
    			break;
    		case "products":
    			$this->products = $value;
    			break;
    	}
    }
}