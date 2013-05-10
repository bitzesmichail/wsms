<?php

require_once 'Controller.php';
require_once 'Models/CustomerModel.php';

/**
 * Controller for customers
 */
 class CustomerController extends Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		if (isset($_SESSION['role'])) {
 			if ($_SESSION['role'] == 'manager' || $_SESSION['role'] == 'seller') {
				try 
				{
	 				$this->view->render('customers', 'index', CustomerModel::getCustomers());
				}
 				catch(Exception $ex)
			 	{
	 				require_once 'PageController.php';
					$page = new PageController;
					$page->errordb($ex->getMessage());
 				}
	 		}
			else {
 				require_once 'PageController.php';
				$page = new PageController;
				$page->error_accdenied();
			}
 		}
 	}

 	public function create($customer='')
 	{
 		try 
 		{
 			return CustomerModel::create($customer);
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

 	public function delete($idCustomer='')
 	{
 		try 
 		{
	 		return CustomerModel::delete($idCustomer);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public static function viewAll()
 	{
 	  return CustomerModel::getCustomers();
 	}

 	public static function viewById($idCustomer='')
 	{
 		return CustomerModel::getCustomerById($idCustomer);
 	}


 	public function setDiscount($idCustomer='', $idProduct='', $discount)
 	{
 		return CustomerModel::setDiscount($idCustomer, $idProduct, $discount);
 	}

	public function getDiscount($idCustomer='', $idProduct='')
	{
		return CustomerModel::getDiscount($idCustomer, $idProduct);
	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}
 }
