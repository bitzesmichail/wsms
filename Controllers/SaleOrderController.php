<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/ProductModel.php';
require_once 'Models/SaleOrderModel.php';
require_once 'Models/CustomerModel.php';
require_once 'Models/HistoryModel.php';

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
 			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER' || $_SESSION['role'] == 'STOREKEEPER') {
				try 
				{
					$saleorders = SaleOrderModel::getActiveSaleOrders();
					$data = array();
					foreach ($saleorders as &$saleorder)
					{
						$cur_customer = CustomerModel::getCustomerBySsn($saleorder->customerSsn);
						$element = new StdClass();
						$element->id = $saleorder->idSaleOrder;
						$element->name = $cur_customer->name;
						$element->surname = $cur_customer->surname;
						$element->ssn = $cur_customer->ssn;
						$element->dateDue = $saleorder->dateDue;

						$data[] = $element;
	 				}
	 				$this->view->render('sales', 'index', $data);
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

	public function addsaleorder()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$data = new StdClass();
					$data->customers = CustomerModel::getCustomers();
					$data->products = ProductModel::getProducts();

					$this->view->render('sales', 'addsale_step1', $data); 
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

	public function addsale_customer()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$data = CustomerModel::getCustomers();

					$this->view->render('sales', 'addsale_customer', $data); 
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

	public function addsale_products()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$data = new StdClass();
					$data->customer = CustomerModel::getCustomerBySsn($_POST['customerssn']);
					$data->products = ProductModel::getProducts();
					$data->products_with_discount = array();

					foreach ($data->products as &$value) {
						$element = new StdClass();
						$element->sku = $value->sku;
						$element->description = $value->description;
						$element->priceSale = $value->priceSale;
						$element->availableSum = $value->availableSum;
						
						if(($value_discount = CustomerModel::getDiscount($_POST['customerssn'], $value->sku)) != null)
							$element->discount = $value_discount;
						else
							$element->discount = 0.0;

						$data->products_with_discount[] = $element;
					}

					$this->view->render('sales', 'addsale_products', $data); 
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

	public function saleHistory()
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{          
					$this->view->render('sales', 'saleHistory', null); 
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
					/*	
					    $dateDue, 
						$customerSsn, 
						$idUser, 
						$status,
						$middleProductObjArray,
						$dateCreated = null,
						$idSaleOrder = null, 
						$dateUpdated = null,
						$dateClosed = null,
    					$address = null)
					*/    		
					/*			
						$sku,
						$description,
						$priceSale,
						$priceSupply,
						$discount,
						$quantityCreated,
						$quantityClosed = null)
					*/
					// var_dump($_POST['sku']);
					$sku = array();
					$middleProductObjArray = array();

					foreach ($_POST['sku'] as &$selectedProduct) {
						$sku = explode(':', $selectedProduct);
						$middleProductObjArray[] = ProductModel::getProductBySku($sku[0]);
					}

					var_dump($middleProductObjArray);

					//for($i = 0; $i <= count($_POST['sku']) - 1; $i++)
					//{
					//	$middleProductObjArray[] = new MiddleProduct($_POST['sku'], $_POST['description'], $_POST['priceSale'], 
					//										       $_POST['priceSupply'], $_POST['discount'], $_POST['quantityCreated'], null);
					//}
					$saleOrderObj = new SaleOrder($_POST['dateDueFinal'], $_POST['customerSsn'], $_SESSION['idUser'], 
						                          'active', $middleProductObjArray, null, null, null, null, null);

					SaleOrderModel::create($saleOrderObj);
	 				SaleOrderController::index();
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

 	public function editsaleorder($id='')
 	{
 		if (isset($_SESSION['role'])) {
 			if($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				try 
				{
					$data = new StdClass();
					$data->saleorder = SaleOrderModel::getSaleOrderById($id);
					$data->customer = CustomerModel::getCustomerBySsn($data->saleorder->customerSsn);
						
					$this->view->render('sales', 'edit', $data);
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
 		$middleProductObjArray = unserialize($_POST['middleProducts']);
 		var_dump($_POST['dateDue']);
 		var_dump($_POST['ssn']);
 		var_dump($middleProductObjArray);
 		var_dump($_POST['dateDue']);
 		$saleOrderObj = new SaleOrder($_POST['dateDue'], $_POST['ssn'], '', 
						                          'active', $middleProductObjArray, null, null, null, null, null);

 		SaleOrderModel::update($saleOrderObj);
 	}

 	//export σε Excel
 	public function exportStatistics()
 	{
 		HistoryModel::getHistorySaleOrdersToExcel($_SESSION['username']);
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
