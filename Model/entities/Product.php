<?php
 
class Product 
{
    
    private $idProduct;
    private $sku;
    private $description;
    private $priceSale;
    private $priceSupply;
    private $availableSum;
    private $reservedSum;
    private $orderedSum;
    private $criticalSum;
    
    public function __construct($sku,
				$description,
				$priceSale,
				$priceSupply,
				$availableSum,
				$reservedSum,
				$orderedSum,
				$criticalSum,
				$idProduct)
    {
	$this->idProduct = $idProduct;
	$this->sku = $sku;
	$this->description = $description;
	$this->priceSale = $priceSale;
	$this->priceSupply = $priceSupply;
	$this->availableSum = $availableSum;
	$this->reservedSum = $reservedSum;
	$this->orderedSum = $orderedSum;
	$this->criticalSum = $criticalSum;
    }
    
    public function __get($param)
    {
	switch ($param)
	{    
	    case "idProduct":
		return $this->idProduct;
	    case "sku":
		return $this->sku;
	    case "description":
		return $this->description;
	    case "priceSale":
		return $this->priceSale;
	    case "priceSupply":
		return $this->priceSupply;
	    case "availableSum":
		return $this->availableSum;
	    case "reservedSum":
		return $this->reservedSum;
	    case "orderedSum":
		return $this->orderedSum;
	    case "criticalSum":
		return $this->criticalSum;
	}
    }

    public function __set($name, $value)
    {
	switch ($name)
	{
	    case "idProduct":
    		$this->idProduct = $value;
		break;
	    case "sku":
		$this->sku = $value;
		break;
	    case "description":
		$this->description = $value;
		break;
	    case "priceSale":
		$this->priceSale = $value;
		break;
	    case "priceSupply":
		$this->priceSupply = $value;
		break;
	    case "availableSum":
		$this->availableSum = $value;
		break;
	    case "reservedSum":
		$this->reservedSum = $value;
		break;	 	    
	    case "orderedSum":
		$this->orderedSum = $value;
		break;
	    case "criticalSum":
		$this->criticalSum = $value;
		break;   
	}
    }
}