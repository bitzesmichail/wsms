<?php

require_once 'Controller.php';
require_once 'Model/ProductModel.php';

/**
 * Controller for products
 */
 class ProductController extends Controller
 {
 	function __construct()
 	{
 		# code...
 	}

 	public function create($product='')
 	{
 		try 
 		{
 			return ProductModel::create($product);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update($new_product='')
 	{
 		try 
 		{
	 		return ProductModel::update($newProduct);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete($id='')
 	{
 		try 
 		{
	 		return ProductModel::delete($idProduct);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public static function viewAll()
 	{
 		// return ProductModel::getProducts();
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

 	public function viewByDescription($value='')
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

 	public function viewByType($type='')
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