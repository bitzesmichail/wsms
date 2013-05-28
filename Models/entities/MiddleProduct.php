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
	private $income;
	private $outcome;
	private $profit;
	
    public function __construct($sku,
								$description,
								$priceSale,
								$priceSupply,
								$discount,
								$quantityCreated,
								$quantityClosed = null,
    							$income = null,
    							$outcome = null,
    							$profit = null)
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
		$this->income = $income;
		$this->outcome = $outcome;
		$this->profit = $profit;
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
			case "income":
				return $this->income;
			case "outcome":
				return $this->outcome;
			case "profit":
				return $this->profit;
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
			case "income":
				$this->income = $value;
				break;
			case "outcome":
				$this->outcome = $value;
				break;
			case "profit":
				$this->profit = $value;
				break;
		}
    }
}