<?php

require_once 'Controller/ProductController.php';
require_once 'Model/entities/Product.php';

class ProductControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testViewAll()
	{
		echo "\nView all Products test\n";
		$products = ProductController::viewAll();
		if (is_array($products)) {
			foreach ($products as &$value) {
				echo $value->sku ."\n";
			}
		}
	}
}