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
	 			$this->view->render('product', 'index', ProductModel::getProducts());
	 		}
 		}
 		else
 		{
 			require_once 'PageController.php';
 			$controller = new PageController();
			$controller->error404("not yet implemented");
 		}
 	}
 	
 	public function addproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('product', 'addproduct', ProductModel::getProducts()); 
			}
 		}
 		else {
			$this->view->render('product', null, null);
		}
 	}

 	public function editproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('product', 'editproduct', ProductModel::getProductById($_GET['id'])); 
			}
 		}
 		else {
			$this->view->render('product', null, null);
		}
 	}

 	public function deleteproduct()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('product', 'deleteproduct', ProductModel::getProductById($_GET['id'])); 
			}
 		}
 		else {
			$this->view->render('product', null, null);
		}
 	}

 	public function create()
 	{
 		try 
 		{
	 		if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					$product = new Product($_POST['sku'], $_POST['description'], $_POST['priceSale'], $_POST['priceSupply'], $_POST['availableSum'], 0, 0, $_POST['criticalSum']);
 					ProductModel::create($product);
 					ProductController::index();
 				}
 			}
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update()
 	{
 		try 
 		{
	 		if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					$product = new Product($_POST['sku'], $_POST['description'], $_POST['priceSale'], $_POST['priceSupply'], $_POST['availableSum'], $_POST['reservedSum'], $_POST['orderedSum'], $_POST['criticalSum'], $_POST['idProduct']);
 					ProductModel::update($product);
 					ProductController::index();
 				}
 			}
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete()
 	{
 		try 
 		{
 			if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					ProductModel::delete($_POST['idProduct']);
 					ProductController::index();
 				}
 			}

 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
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
