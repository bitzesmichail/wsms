<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/ProductModel.php';
require_once 'Models/SupplyOrderModel.php';
require_once 'Models/ProviderModel.php';
require_once 'Models/HistoryModel.php';

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
 			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER' || $_SESSION['role'] == 'STOREKEEPER') {
				try 
				{
					$supplyorders = SupplyOrderModel::getSupplyOrders();
					$data = array();
					foreach ($supplyorders as &$supplyorder)
					{
						
						$element = new StdClass();
						$element->provider = ProviderModel::getProviderBySsn($supplyorder->providerSsn);
						$element->order = $supplyorder;
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
					$data = new StdClass();
					$data = HistoryModel::getHistorySupplyOrders();
					$this->view->render('supplies', 'supplyHistory', $data); 
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

 	public function edit($id='')
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
					$data = new StdClass();
					$data->supplyorder = SupplyOrderModel::getSupplyOrderById($id);
					$data->customer = ProviderModel::getProviderBySsn($data->supplyorder->providerSsn);
						
					$this->view->render('supplies', 'edit', $data);
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

 	//export σε Excel
 	public function exportStatistics()
 	{
 		HistoryModel::getHistorySupplyOrdersToExcel($_SESSION['username']);
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
