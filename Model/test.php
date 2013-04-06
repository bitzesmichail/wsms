<?php

require_once("UserModel.php");
require_once("RoleModel.php");
require_once("SaleOrderModel.php");
require_once("SupplyOrderModel.php");
require_once("ProductModel.php");
require_once("ProviderModel.php");
require_once("CustomerModel.php");
require_once("NotificationModel.php");
require_once("WishProductModel.php");

require_once("entities/User.php");
require_once("entities/Role.php");
require_once("entities/Product.php");

$productObj = new Product("sku3", "description1", 2.01, 1.00, 15,
				5, 0, 10, 4);

//ProductModel::create($productObj);
//ProductModel::update($productObj);
//ProductModel::delete(4);
$result = ProductModel::getProducts();

echo "<pre>"; print_r($result); echo "</pre>";