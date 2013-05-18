<?php
 
class WishProduct 
{
	private $quantity;
	private $description;
	private $idUser;
	private $idWishProduct;
    
    public function __construct($quantity,
								$description,
								$idUser,
								$idWishProduct = null)
    {
		$this->quantity = $quantity;
		$this->description = $description;
		$this->idUser = $idUser;
		$this->idWishProduct = $idWishProduct;
    }
    
    public function __get($param)
    {
		switch ($param)
		{
			case "idWishProduct":
				return $this->idWishProduct;
			case "quantity":
				return $this->quantity;
			case "description":
				return $this->description;
			case "idUser":
				return $this->idUser;	    
		}
    }
	
    public function __set($name, $value)
    {
		switch ($name)
		{
			case "idWishProduct":
				$this->idWishProduct = $value;
				break;
			case "quantity":
				$this->quantity  = $value;
				break;
			case "description":
				$this->description = $value;
				break;
			case "idUser":
				$this->idUser = $value;
				break;		
		}
    }	
}