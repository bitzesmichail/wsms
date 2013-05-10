<?php

require_once("../ProductModel.php");
require_once("../entities/Product.php");
require_once("../CustomerModel.php");
require_once("../entities/Customer.php");

echo "Creating 100 customers!</br>";
for($i=0;$i<100;$i++){
	CustomerModel::create(new Customer("giwrgos","alkis", $i,"23xxx", "69xxx","giwrgos@gmail","athens","athens","123"));
}

$customers=CustomerModel::getCustomers();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($customers); echo "</pre>";

for($i=0;$i<100;$i++){
	$customers[$i]->zipCode=$i+100;
}

echo "</br>Update the DataBase!</br>";
foreach ($customers as $customer){
	CustomerModel::update($customer);
}

$customers=CustomerModel::getCustomers();
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r($customers); echo "</pre>";

$customersSsns= array();
foreach ($customers as $customer){
	$customersSsnss[]= $customer->ssn;
}

echo "</br>Get all customers by their SSN and then print them!</br>";
foreach ($customersSsnss as $ssn){
	echo "<pre>"; print_r(CustomerModel::getCustomerBySsn($ssn)); echo "</pre>";
}

ProductModel::create(new Product("999", "nero", "1", "1", "1", "1", "1", "1"));
$product=ProductModel::getProductBySku("999");

echo "</br>Create discount record of one product for all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::setDiscount($customer->ssn, $product->sku, "0.1");
}

echo "</br>Get discount for all customers and print it!</br>";
foreach ($customers as $customer){
	echo "<pre>"; print_r(CustomerModel::getDiscount($customer->ssn, $product->sku)); echo "</pre>";
}

echo "</br>Delete discount for all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::removeDiscount($customer->ssn, $product->sku); 
}

echo "</br>Get discount for all customers after delete!No one should appear!</br>";
foreach ($customers as $customer){
	echo "<pre>"; print_r(CustomerModel::getDiscount($customer->ssn, $product->sku)); echo "</pre>";
}

echo "</br>Delete all customers!</br>";
foreach ($customers as $customer){
	CustomerModel::delete($customer->ssn);
}

ProductModel::delete($product->sku);

$customers=CustomerModel::getCustomers();
echo "</br>Printing them after Delete!No one should appear</br>";
echo "<pre>"; print_r($customers); echo "</pre>";
