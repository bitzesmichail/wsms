<?php

require_once 'Controller/CustomerController.php';
require_once 'Model/entities/Customer.php';

class CustomerControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testAll()
	{
		echo "Creating 100 Customers!\n";
		$CustomerController = new CustomerController;
		for($i=0;$i<100;$i++)
		{
			$CustomerController->create(new Customer($i, $i, $i, $i, $i, $i, $i, $i, $i, null));
		}

		$customers=CustomerController::viewAll();
		echo "View all inserted Customers\n";
		if (is_array($customers)) 
		{
			foreach ($customers as &$value) 
			{
				echo $value->name ." ". $value->surname . " " . $value->ssn . "\n";
			}
		}

		echo "Edit Customers!\n";
		$i = 0;
		if (is_array($customers)) 
		{
			foreach ($customers as &$value)
			{
				$value->ssn = $i . "100";
				$value->phone = $value->phone . $i;
				$i++;
			}
		}

		echo "Update Customers!\n";
		if (is_array($customers)) 
		{
			foreach ($customers as &$customer)
			{
				$CustomerController->update($customer);
			}
		}

		$customers=CustomerController::viewAll();
		echo "View all edited Customers\n";
		if (is_array($customers)) 
		{
			foreach ($customers as &$value) 
			{
				echo $value->name ." ". $value->surname . " " . $value->ssn . " " . $value->phone . "\n";
			}
		}

		if (is_array($customers)) 
		{
			echo $value->name ." ". $value->surname . " " . $value->ssn . " " . $value->phone . "\n";

			foreach ($customers as &$customer)
			{
				$CustomerController->setDiscount($customer->idCustomer, 1, 0.5);
			}
		}

		echo "Delete all Customers!\n";
		$customers=CustomerController::viewAll();
		if (is_array($customers)) 
		{
			foreach ($customers as &$value){
				$CustomerController->delete($value->idCustomer);
			}
		}
	}
}