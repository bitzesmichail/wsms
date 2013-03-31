<?php
 
require_once("Model.php");

class CustomerModel extends Model
{
    
    public function __construct()  
    {
        
    }
    
    public function create($customer)  //isws na pername array customer gia na einai beltisto to insert
    {
	//returns message success/fail
    }

    public function update()
    {
	//returns message success/fail
    }

    public function delete()
    {
	//returns message success/fail
    }

    public function getCustomers()
    {
	//returns array of Customer objects
    }

}