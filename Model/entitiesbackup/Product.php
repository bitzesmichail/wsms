<?php
 
class Product 
{
    
    private $product;
    
    public function __construct($product)
    {
	$this->product = $product;
    }
    
    public function __get($param)
    {
	switch ($param)
	{    
	    case "idProduct":
		return $this->product['idProduct'];
	    case "sku":
		return $this->product['sku'];
	    case "description":
		return $this->product['description'];
	    case "priceSale":
		return $this->product['priceSale'];
	    case "priceSupply":
		return $this->product['priceSupply'];
	    case "availableSum":
		return $this->product['availableSum'];
	    case "reservedSum":
		return $this->product['reservedSum'];
	    case "orderedSum":
		return $this->product['orderedSum'];
	    case "criticalSum":
		return $this->product['criticalSum'];
	}
    }

}