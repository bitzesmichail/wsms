<?php
 
class MiddleProduct 
{
    private $sku;
    private $description;
    private $priceSale;
    private $priceSupply;
    private $discount;
	private $quantityCreated;
	private $quantityClosed;
    
    public function __construct($sku,
								$description,
								$priceSale,
								$priceSupply,
								$discount,
								$quantityCreated,
								$quantityClosed = null)
    {
    	if($quantityClosed == null)
    	{
    		$quantityClosed = $quantityCreated;
    	}
    	
		$this->sku = $sku;
		$this->description = $description;
		$this->priceSale = $priceSale;
		$this->priceSupply = $priceSupply;
		$this->quantityCreated = $quantityCreated;
		$this->quantityClosed = $quantityClosed;
		$this->discount = $discount;
    }
    
    public function __get($param)
    {
		switch ($param)
		{    
			case "sku":
				return $this->sku;
			case "description":
				return $this->description;
			case "priceSale":
				return $this->priceSale;
			case "priceSupply":
				return $this->priceSupply;
			case "quantityCreated":
				return $this->quantityCreated;
			case "quantityClosed":
				return $this->quantityClosed;			
			case "discount":
				return $this->discount;				
		}
    }

    public function __set($name, $value)
    {
		switch ($name)
		{
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
			case "quantityCreated":
				$this->quantityCreated = $value;
				break;
			case "quantityClosed":
				$this->quantityClosed = $value;
				break;	 	    
			case "discount":
				$this->discount = $value;
				break; 
		}
    }
}