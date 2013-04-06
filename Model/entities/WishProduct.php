<?php
 
class WishProduct 
{
    
    private ;
    
    public function __construct()
    {
	
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

}