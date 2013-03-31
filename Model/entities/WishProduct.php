<?php
 
class WishProduct 
{
    
    private $wishProduct;
    
    public function __construct($wishProduct)
    {
	$this->wishProduct = $wishProduct;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idWishProduct":
		return $this->wishProduct['idWishProduct'];
	    case "quantity":
		return $this->wishProduct['quantity'];
	    case "description":
		return $this->wishProduct['description'];
	    case "idUser":
		return $this->wishProduct['idUser'];	    
	}
    }

}