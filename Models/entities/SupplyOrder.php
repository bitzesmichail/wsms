<?php
 
class SupplyOrder 
{
 
    private $supplyOrder;
    
    public function __construct($supplyOrder)
    {
        $this->supplyOrder = $supplyOrder;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idSupplyOrder":
		return $this->supplyOrder['idSupplyOrder'];
	    case "dateCreated":
		return $this->supplyOrder['dateCreated'];
	    case "dateClosed":
		return $this->supplyOrder['dateClosed'];
	    case "dateDue":
		return $this->supplyOrder['dateDue'];
	    case "idProvider":
		return $this->supplyOrder['idProvider'];
	    case "idUser":
		return $this->supplyOrder['idUser'];	    
	}
    }

}