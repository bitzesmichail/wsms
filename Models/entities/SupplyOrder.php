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
	    case "providerSsn":
		return $this->supplyOrder['providerSsn'];
	    case "idUser":
		return $this->supplyOrder['idUser'];
		case "dateUpdated":
			return $this->supplyOrder['dateUpdated'];
		case "status":
			return $this->supplyOrder['status'];
	}
    }

}