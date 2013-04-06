<?php

require_once 'Controller/ProductController.php';
require_once 'Model/entities/Product.php';

class ProductControllerTest extends PHPUnit_Framework_TestCase 
{

	public function testAll()
	{
		echo "Creating 100 Products!\n";
		$ProductController = new ProductController;
		for($i=0;$i<100;$i++)
		{
			$ProductController->create(new Product($i, $i, $i, $i, $i, $i, $i, $i));
		}

		$products=ProductController::viewAll();
		echo "View all inserted Products\n";
		if (is_array($products)) 
		{
			foreach ($products as &$value) 
			{
				echo $value->sku ." ". $value->priceSale . " " . $value->priceSupply . "\n";
			}
		}

		echo "Edit Products!\n";
		$i = 0;
		if (is_array($products)) 
		{
			foreach ($products as &$value)
			{
				$value->priceSale = $i+100;
				$value->priceSupply = $i;
				$i++;
			}
		}

		echo "Update Products!\n";
		if (is_array($products)) 
		{
			foreach ($products as &$product)
			{
				$ProductController->update($product);
			}
		}

		$products=ProductController::viewAll();
		echo "View all edited Products\n";
		if (is_array($products)) 
		{
			foreach ($products as &$value) 
			{
				echo $value->sku ." ". $value->priceSale . " " . $value->priceSupply . "\n";
			}
		}

		echo "Get products with sku: 0,1,2,3 and print them!\n";
		for($i=0;$i<4;$i++)
		{
			$value = ProductController::viewBySku($i);
			if ($value instanceof Product) 
			{
				echo $value->idProduct . "\n";
			}
		}

		echo "Delete all products!\n";
		$products=ProductController::viewAll();
		if (is_array($products)) 
		{
			foreach ($products as &$value){
				$ProductController->delete($value->idProduct);
			}
		}
	}
	
	public function testViewAll()
	{
		echo "\nView all Products test\n";
		$products = ProductController::viewAll();
		if (is_array($products)) 
		{
			foreach ($products as &$value) 
			{
				echo $value->sku ."\n";
			}
		}
	}
}