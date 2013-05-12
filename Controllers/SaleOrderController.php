<?php

require_once 'Controller.php';
require_once 'Models/SaleOrderModel.php';

/**
 * Controller for sale orders
 */
 class SaleOrderController extends Controller
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
	 				$this->view->render('sales', 'index', SaleOrderModel::getSaleOrders());
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

 	public function create($sale='')
 	{
 		return 0;
 	}

 	public function update($id='', $new_sale='')
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

 	public function execute($sale='')
 	{
 		return 0;
 	}

 	public function getFinancialByDate($dateTime='')
 	{
 		return 0;
 	}

 	public function getFinancialByCustomer($customer_id='')
 	{
 		return 0;
 	}

 	public function getFinancialByProduct($product_id='')
 	{
 		return 0;
 	}
 }
