<?php
 
class SaleOrder 
{
    
    private $saleOrder;
    
    public function __construct($saleOrder)
    {
        $this->saleOrder = $saleOrder;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idSaleOrder":
		return $this->saleOrder['idSaleOrder'];
	    case "dateCreated":
		return $this->saleOrder['dateCreated'];
	    case "dateClosed":
		return $this->saleOrder['dateClosed'];
	    case "dateDue":
		return $this->saleOrder['dateDue'];
	    case "customerSsn":
		return $this->saleOrder['customerSsn'];
	    case "idUser":
		return $this->saleOrder['idUser'];	
		case "status":
			return $this->saleOrder['status'];
		case "dateUpdated":
			return $this->saleOrder['dateUpdated'];
	}
    }

}