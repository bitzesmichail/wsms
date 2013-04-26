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
	    case "idCustomer":
		return $this->saleOrder['idCustomer'];
	    case "idUser":
		return $this->saleOrder['idUser'];	    
	}
    }

}