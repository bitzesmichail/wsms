<?php

require_once 'Controller.php';
require_once 'Model/CustomerModel.php';

/**
 * Controller for customers
 */
 class CustomerController extends Controller
 {
 	function __construct()
 	{
 		# code...
 	}

 	public function create($customer='')
 	{
 		try 
 		{
 			return CustomerModel::create($Customer);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update($newCustomer='')
 	{
 			try 
 		{
	 		return CustomerModel::update($newCustomer);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete($id='')
 	{
 		try 
 		{
	 		return CustomerModel::delete($id);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function viewCustomers()
 	{
 		return CustomerModel::getCustomers();
 	}

 	public function viewACustomer($id='')
 	{
 		return CustomerModel::getCustomerById($id);
 	}


 	public function setDiscount($idCustomer='', $idProduct='', $discount)
 	{
 		return CustomerModel::setDiscount($idCustomer, $idProduct, $discount);
 	}

	public function getDiscount($idCustomer='', $idProduct='')
	{
		return CustomerModel::getDiscount($idCustomer, $idProduct)
	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}
 }
