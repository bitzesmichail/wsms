<?php

require_once("../ProductModel.php");
require_once("../entities/Product.php");
require_once("../CustomerModel.php");
require_once("../entities/Customer.php");

echo "Creating 100 customers!</br>";
for($i=0;$i<100;$i++){
	CustomerModel::create(new Customer("giwrgos","alkis", $i,"23xxx", "69xxx","giwrgos@gmail","athens","123","athens"));
}

$customers=CustomerModel::getCustomers();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($customers); echo "</pre>";

for($i=0;$i<100;$i++){
	$customers[$i]->ssn=$i+100;
}

echo "</br>Update the DataBase!</br>";
foreach ($customers as $customer){
	CustomerModel::update($customer);
}

$customers=CustomerModel::getCustomers();
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r($customers); echo "</pre>";

$customersIds= array();
foreach ($customers as $customer){
	$customersIds[]= $customer->idCustomer;
}

echo "</br>Get all customers by their ID and then print them!</br>";
foreach ($customersIds as $id){
	echo "<pre>"; print_r(CustomerModel::getCustomerById($id)); echo "</pre>";
}

ProductModel::create(new Product("999", "nero", "1", "1", "1", "1", "1", "1"));
$product=ProductModel::getProductBySku("999");

echo "</br>Create discount record of one product for all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::setDiscount($customer->idCustomer, $product->idProduct, "0.1");
}

echo "</br>Get discount for all customers and print it!</br>";
foreach ($customers as $customer){
	echo "<pre>"; print_r(CustomerModel::getDiscount($customer->idCustomer, $product->idProduct)); echo "</pre>";
}

echo "</br>Delete discount for all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::removeDiscount($customer->idCustomer, $product->idProduct); 
}

echo "</br>Get discount for all customers after delete!No one should appear!</br>";
foreach ($customers as $customer){
	echo "<pre>"; print_r(CustomerModel::getDiscount($customer->idCustomer, $product->idProduct)); echo "</pre>";
}

echo "</br>Delete all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::delete($customer->idCustomer);
}

ProductModel::delete($product->idProduct);

$customers=CustomerModel::getCustomers();
echo "</br>Printing them after Delete!No one should appear</br>";
echo "<pre>"; print_r($customers); echo "</pre>";
