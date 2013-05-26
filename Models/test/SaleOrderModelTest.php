<?php


require_once("../SaleOrderModel.php");
require_once("../entities/SaleOrder.php");
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

$middleProductObjArray[0]=new MiddleProduct(2424, "testProduct", 10.2, 5.2, 5, 50);
$middleProductObjArray[1]=new MiddleProduct(2425, "testProduct2", 7.2, 2.2, 5, 20);
$dateDue=date('Y-m-d H:i:s');

echo "Get two Users to do the job!</br>";

$seller=UserModel::getUserByUsername("seller");
$manager=UserModel::getUserByUsername("manager");

echo "Creating SaleOrder!</br>";

SaleOrderModel::create(new SaleOrder($dateDue, 1111, $seller->idUser, "inactive", $middleProductObjArray));

echo "Print them! None should appear!</br>";

$saleorders=SaleOrderModel::getActiveSaleOrders();


foreach ($saleorders as $saleorder){
	echo "<pre>"; print_r($saleorder); echo "</pre>";
}

$saleorders=SaleOrderModel::getSaleOrders();

foreach ($saleorders as $saleorder){
	$order = SaleOrderModel::getSaleOrderById($saleorder->idSaleOrder);
	echo "<pre>"; print_r($order); echo "</pre>";
}

echo "Change Status!</br>";

foreach ($saleorders as $saleorder){
	SaleOrderModel::activateSaleOrder($saleorder->idSaleOrder);
}

echo "Print them again!</br>";

$saleorders=SaleOrderModel::getActiveSaleOrders();


foreach ($saleorders as $saleorder){
	echo "<pre>"; print_r($saleorder); echo "</pre>";
}

echo "Update them!</br>";
sleep("2");
$dateDue=date('Y-m-d H:i:s');

foreach ($saleorders as $saleorder){
	$s=new SaleOrder($dateDue, 1111, $seller->idUser, "active", $middleProductObjArray, $saleorder->dateCreated, $saleorder->idSaleOrder);
	SaleOrderModel::update($s);
}

echo "Get Seller's Active!";

$saleorders=SaleOrderModel::getSaleOrdersByStatus("seller", "active");

foreach ($saleorders as $saleorder){
	echo "<pre>"; print_r($saleorder); echo "</pre>";
}


echo "Print them all!";

$saleorders=SaleOrderModel::getSaleOrders();

foreach ($saleorders as $saleorder){
	echo "<pre>"; print_r($saleorder); echo "</pre>";
}

echo "Delete everything!</br>";

foreach ($saleorders as $saleorder){
	SaleOrderModel::delete($saleorder->idSaleOrder);
}


ProductModel::delete(2424);
ProductModel::delete(2425);