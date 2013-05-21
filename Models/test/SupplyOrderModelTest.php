<?php

require_once("../ProviderModel.php");
require_once("../entities/Provider.php");
require_once("../SupplyOrderModel.php");
require_once("../entities/SupplyOrder.php");
require_once("../UserModel.php");
require_once("../entities/User.php");
require_once("../ProductModel.php");
require_once("../entities/Product.php");
require_once("../entities/MiddleProduct.php");

date_default_timezone_set('Europe/Athens');
echo "Creating 2 Products!</br>";

ProductModel::create(new Product(2424,"testProduct",10.2,5.2, 100, 2, 50, 10));
ProductModel::create(new Product(2425,"testProduct2",7.2,2.2, 300, 150, 75, 50));


$middleProductObjArray = array();

$middleProductObjArray[0]=new MiddleProduct(2424, "testProduct", 10.2, 5.2, NULL, 50);
$middleProductObjArray[1]=new MiddleProduct(2425, "testProduct2", 7.2, 2.2, NULL, 20);
$dateDue=date('Y-m-d H:i:s');

echo "Get one Seller to do the job!</br>";

$seller=UserModel::getUserByUsername("seller");
$manager=UserModel::getUserByUsername("manager");

echo "Creating 1 Provider!</br>";

ProviderModel::create(new Provider("giorgos","ele",222,"athens",123,"athens"));

echo "Creating 2 SupplyOrders!</br>";

SupplyOrderModel::create(new SupplyOrder($dateDue,222, $seller->idUser, "active", $middleProductObjArray, NULL));
SupplyOrderModel::create(new SupplyOrder($dateDue,222, $manager->idUser, "active", $middleProductObjArray, NULL));

echo "Retrive them back!</br>";


$supplyorders=SupplyOrderModel::getSupplyOrders();

$id;

foreach ($supplyorders as $supplyorder){
	$id=$supplyorder->idSupplyOrder;
	echo "<pre>"; print_r($supplyorder); echo "</pre>";
}

echo "getSupplyOrderById</br>";

$one = SupplyOrderModel::getSupplyOrderById($id);
echo "<pre>"; print_r($one); echo "</pre>";

echo "Update them!</br>";
sleep("2");
$dateDue=date('Y-m-d H:i:s');

foreach ($supplyorders as $supplyorder){
	$s=new SupplyOrder($dateDue, 222, $seller->idUser, "active", $middleProductObjArray, $supplyorder->dateCreated, $supplyorder->idSupplyOrder);
	SupplyOrderModel::update($s);
}


echo "Retrive them back!</br>";


$supplyorders=SupplyOrderModel::getSupplyOrders();


foreach ($supplyorders as $supplyorder){
	echo "<pre>"; print_r($supplyorder); echo "</pre>";
}

echo "getSupplyOrderById</br>";

$one = SupplyOrderModel::getSupplyOrderById($id);
echo "<pre>"; print_r($one); echo "</pre>";

echo "getSupplyOrderByProvider</br>";

$one = SupplyOrderModel::getSupplyOrdersByProvider(222);
echo "<pre>"; print_r($one); echo "</pre>";

echo "Delete everything!</br>";

foreach ($supplyorders as $supplyorder){
	SupplyOrderModel::delete($supplyorder->idSupplyOrder);
}


ProviderModel::delete(222);

ProductModel::delete(2424);
ProductModel::delete(2425);