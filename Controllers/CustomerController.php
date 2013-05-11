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
 			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
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
 	public function addcustomer()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{
					$this->view->render('customers', 'addcustomer', CustomerModel::getCustomers()); 
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

 	public function editcustomer()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER'|| $_SESSION['role'] == 'SELLER') {
				try 
				{
					$this->view->render('customer', 'editcustomer', CustomerModel::getCustomerBySsn($_GET['ssn'])); 
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

 	public function deletecustomer()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{
					$this->view->render('customer', 'deletecustomer', CustomerModel::getCustomerBySsn($_GET['ssn'])); 
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

 	public function create()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{
 					$customer = new Customer($_POST['name'], $_POST['surname'], 
 						                     $_POST['ssn'], $_POST['phone'], 
 						                     $_POST['cellphone'], $_POST['email'], 
 						                     $_POST['address'], $_POST['city'], $_POST['zipCode']);
 					CustomerModel::create($customer);
	 				CustomerController::index();
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

 	public function update()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try
				{
 					$customer = new Customer($_POST['name'], $_POST['surname'], 
 						                     $_POST['ssn'], $_POST['phone'], 
 						                     $_POST['cellphone'], $_POST['email'], 
 						                     $_POST['address'], $_POST['city'], $_POST['zipCode']);ProductModel::update($product);
 					CustomerModel::update($customer);
	 				CustomerController::index();
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

 	public function delete()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try
				{
 					CustomerModel::delete($_POST['ssn']);
 					CustomerController::index();
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

 	/*public static function viewAll()
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
 	}*/
 }
