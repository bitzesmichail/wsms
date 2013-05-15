<?php

require_once 'Controller.php';
require_once 'Models/ProviderModel.php';

/**
 * Controller for providers
 */
 class ProviderController extends Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		if (isset($_SESSION['role'])) {
 			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
	 				$this->view->render('providers', 'index', ProviderModel::getProviders());
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

 	public function addprovider()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
					$this->view->render('providers', 'addprovider', ProviderModel::getProviders()); 
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

 	public function editprovider()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER'|| $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
					$this->view->render('providers', 'editprovider', ProviderModel::getProviderBySsn($_GET['ssn'])); 
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

 	public function deleteprovider()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
					$this->view->render('providers', 'deleteprovider', ProviderModel::getProviderBySsn($_GET['ssn'])); 
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
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
 					$provider = new Provider($_POST['name'], $_POST['surname'], 
 						                     $_POST['ssn'], $_POST['phone'], 
 						                     $_POST['cellphone'], $_POST['email'], 
 						                     $_POST['address'], $_POST['city'], $_POST['zipCode']);
 					ProviderModel::create($provider);
	 				ProviderController::index();
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
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try
				{
 					$provider = new Provider($_POST['name'], $_POST['surname'], 
 						                     $_POST['ssn'], $_POST['phone'], 
 						                     $_POST['cellphone'], $_POST['email'], 
 						                     $_POST['address'], $_POST['city'], $_POST['zipCode']);
 					ProviderModel::update($provider);
	 				ProviderController::index();
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
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try
				{
 					ProviderModel::delete($_POST['ssn']);
 					ProviderController::index();
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
 		return ProviderModel::getProviders();
 	}

 	public function viewById($id='')
 	{
 		$providers = ProviderModel::getProviders();

 		if (is_array($providers)) 
 		{
 			foreach ($providers as &$value) 
 			{
 				if ($value->idProvider == $id)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public function viewByProduct($product_id='')
 	{
		return 0;
 	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}*/
 }
