<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/ProductModel.php';
require_once 'Models/SaleOrderModel.php';
require_once 'Models/CustomerModel.php';
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
					$saleorders = SaleOrderModel::getSaleOrdersByStatus($_SESSION['username'], 'active');
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

					$this->view->render('sales', 'addsale', $data); 
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
					$middleProductObjArray = array();
					for($i = 0; $i <= count($_POST['sku']) - 1; $i++)
					{
						$middleProductObjArray[] = new MiddleProduct($_POST['sku'], $_POST['description'], $_POST['priceSale'], 
															       $_POST['priceSupply'], $_POST['discount'], $_POST['quantityCreated'], null);
					}
					$saleOrderObj = new SaleOrder($_POST['dateDue'], $_POST['customerSsn'], $_POST['idUser'], 
						                          $_POST['status'], $middleProductObjArray, $_POST['dateCreated'], null, null, null, $_POST['address']);

					//SaleOrderModel::create($saleOrderObj);
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
					$saleorder = SaleOrderModel::getSaleOrderById($id);
					$cur_customer = CustomerModel::getCustomerBySsn($saleorder->customerSsn);
					$element = new StdClass();
					$element->id = $saleorder->idSaleOrder;
					$element->name = $cur_customer->name;
					$element->surname = $cur_customer->surname;
					$element->ssn = $cur_customer->ssn;
					$element->dateDue = $saleorder->dateDue;

					$data[] = $element;
						
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
