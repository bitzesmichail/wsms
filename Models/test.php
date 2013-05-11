<?php

require_once("UserModel.php");
require_once("SaleOrderModel.php");
require_once("SupplyOrderModel.php");
require_once("ProductModel.php");
require_once("ProviderModel.php");
require_once("CustomerModel.php");
require_once("WishProductModel.php");

require_once("entities/User.php");
require_once("entities/Product.php");
require_once("entities/MiddleProduct.php");
require_once("entities/Customer.php");
require_once("entities/Provider.php");


try {
/*
	$arr = [new MiddleProduct('DINO.0001', 'μπλα3', '5.00', '34.00', '0.500', '10'), 
		new MiddleProduct('DINO.0004', 'mpla4', '34.00', '1.00', '0.100', '15')];   
                 
	$obj = new SaleOrder(date('Y-m-d H:i:s'), '1111', 1, 'active', $arr);				 
	$result = SaleOrderModel::create($obj);*/
	
	$result = SaleOrderModel::getSaleOrders();
	echo "<pre>"; print_r($result); echo "</pre>";
} catch(Exception $e) {
	$e->getMessage();
}


