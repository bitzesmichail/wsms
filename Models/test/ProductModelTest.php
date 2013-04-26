<?php

require_once("../ProductModel.php");
require_once("../entities/Product.php");


echo "Creating 100 Products!</br>";
for($i=0;$i<100;$i++){
	ProductModel::create(new Product($i, $i, $i, $i, $i, $i, $i, $i));
}

$products=ProductModel::getProducts();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($products); echo "</pre>";

echo "</br>Update values in all products!</br>";
for($i=0;$i<100;$i++){
	$products[$i]->priceSale=$i+100;
	$products[$i]->priceSupply=$i+100;
}

echo "</br>Update the DataBase!</br>";
foreach ($products as $product){
	ProductModel::update($product);
}

$products=ProductModel::getProducts();
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r($products); echo "</pre>";

echo "</br>Now get products with sku: 0,1,2,3 and print them!</br>";
for($i=0;$i<4;$i++){
	echo "<pre>"; print_r(ProductModel::getProductBySku($i)); echo "</pre>";
}

echo "</br>Now delete all products!</br>";
foreach ($products as $product){
	ProductModel::delete($product->idProduct);
}

$products=ProductModel::getProducts();
echo "</br>Printing them after Delete!Now one should appear!</br>";
echo "<pre>"; print_r($products); echo "</pre>";

