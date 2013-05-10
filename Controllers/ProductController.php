<?php

require_once 'Controller.php';
require_once 'Models/ProductModel.php';

/**
 * Controller for products
 */
 class ProductController extends Controller
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
	 				$this->view->render('product', 'index', ProductModel::getProducts());
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
 	
 	public function addproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				try 
				{
					$this->view->render('product', 'addproduct', ProductModel::getProducts()); 
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

 	public function editproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				try 
				{
					$this->view->render('product', 'editproduct', ProductModel::getProductBySku($_GET['sku'])); 
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

 	public function deleteproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				try 
				{
					$this->view->render('product', 'deleteproduct', ProductModel::getProductBySku($_GET['sku'])); 
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
 			if( $_SESSION['role'] == 'manager') {
				try 
				{
 					$product = new Product($_POST['sku'], $_POST['description'], $_POST['priceSale'], $_POST['priceSupply'], $_POST['availableSum'], 0, 0, $_POST['criticalSum']);
 					ProductModel::create($product);
	 				ProductController::index();
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
 			if( $_SESSION['role'] == 'manager') {
				try
				{
 					$product = new Product($_POST['sku'], $_POST['description'], $_POST['priceSale'], $_POST['priceSupply'], $_POST['availableSum'], $_POST['reservedSum'], $_POST['orderedSum'], $_POST['criticalSum'], $_POST['idProduct']);
 					ProductModel::update($product);
 					ProductController::index();
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
 			if( $_SESSION['role'] == 'manager') {
				try
				{
 					ProductModel::delete($_POST['sku']);
 					ProductController::index();
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

 	public static function viewAll()
 	{
 		return ProductModel::getProducts();
 	}

 	public function viewById($id='')
 	{
 		$products = ProductModel::getProducts();

 		if (is_array($products)) 
 		{
 			foreach ($products as &$value) 
 			{
 				if ($value->idProduct == $id)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public static function viewBySku($sku='')
 	{
 		$products = ProductModel::getProducts();

 		if (is_array($products)) 
 		{
 			foreach ($products as &$value) 
 			{
 				if ($value->sku == $sku)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public static function viewByDescription($value='')
 	{
 		$products = ProductModel::getProducts();

 		if (is_array($products)) 
 		{
 			foreach ($products as &$value) 
 			{
 				if ($value->description == $value)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public static function viewByType($type='')
 	{
 		return 0;
 	}

 	public function viewByCustomer($value='')
 	{
 		return 0;
 	}

 	public function viewByProvider($value='')
 	{
 		return 0;
 	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}

 	public function createWishProduct($product='')
 	{
 		return 0;
 	}

 	public function updateWishProduct($id='', $new_product='')
 	{
 		return 0;
 	}

 	public function deleteWishProduct($id='')
 	{
 		return 0;
 	}

 	public function viewWishProduct()
 	{
 		return 0;
 	}
 }
