<?php

require_once 'Controller/ProductController.php';
require_once 'Model/entities/Product.php';

class ProductControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testViewAll()
	{
		$products = ProductController::viewAll();
		if (is_array($products)) {
			foreach ($products as &$value) {
				echo $value->sku ."\n";
			}
		}
	}
}