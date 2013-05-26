<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/ProductModel.php';
require_once 'Models/SupplyOrderModel.php';
require_once 'Models/ProviderModel.php';

/**
 * Controller for supply orders
 */
 class SupplyOrderController extends Controller
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
					$supplyorders = SupplyOrderModel::getSupplyOrders();
					$data = array();
					foreach ($supplyorders as &$supplyorder)
					{
						$cur_provider = ProviderModel::getProviderBySsn($supplyorder->providerSsn);
						$element = new StdClass();
						$element->id = $supplyorder->idSupplyOrder;
						$element->name = $cur_provider->name;
						$element->surname = $cur_provider->surname;
						$element->ssn = $cur_provider->ssn;
						$element->dateDue = $supplyorder->dateDue;

						$data[] = $element;
	 				}
	 				$this->view->render('supplies', 'index', $data);
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

	public function addsupplyorder()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$data = new StdClass();
					$data->providers = ProviderModel::getProviders();
					$data->products = ProductModel::getProducts();

					$this->view->render('supplies', 'addsupply_step1', $data); 
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

	public function supplyHistory()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$this->view->render('supplies', 'supplyHistory', null); 
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

 	public function create($supply='')
 	{
 		return 0;
 	}

 	public function update($id='', $new_supply='')
 	{
 		return 0;
 	}

 	public function delete($id='')
 	{
 		return 0;
 	}

 	public function view()
 	{
 		return 0;
 	}

 	public function viewById($id='')
 	{
 		return 0;
 	}

 	public function viewByDate($dateTime='')
 	{
 		return 0;
 	}

 	public function viewExecuted()
 	{
 		return 0;
 	}

 	public function viewRemaining()
 	{
 		return 0;
 	}

 	public function execute($supply='')
 	{
 		return 0;
 	}

 	public function getFinancialByDate($dateTime='')
 	{
 		return 0;
 	}

 	public function getFinancialByProvider($provider_id='')
 	{
 		return 0;
 	}

 	public function getFinancialByProduct($product_id='')
 	{
 		return 0;
 	}
 }
