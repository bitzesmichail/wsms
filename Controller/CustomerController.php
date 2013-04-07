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

 	public public function create($customer='')
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

 	public function update($id='', $new_customer='')
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

 	public function view()
 	{
 		return CustomerModel::getProducts();
 	}

 	public function viewById($id='')
 	{
 		return 0;
 	}

 	public function viewByProduct($product_id='')
 	{
 		return 0;
 	}

 	public function setDiscount($id='', $product_id)
 	{
 		return 0;
 	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}
 }
