<?php


require_once("../ProviderModel.php");
require_once("../entities/Provider.php");

echo "Creating 100 providers!</br>";
for($i=0;$i<100;$i++){
	ProviderModel::create(new Provider("giorgos","eleutheriou", $i,"23xxx","69xxx","giorgos@gmail.com","athens","123","athens"));
}

$providers=ProviderModel::getProviders();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($providers); echo "</pre>";


echo "</br>Change the providers!</br>";
foreach ($providers as $provider){
	$provider->city="thesaloniki";
	$provider->email="alkis@gmail.com";
}
echo "</br>Update the db for changes!</br>";
foreach ($providers as $provider){
	ProviderModel::update($provider);
}
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r(ProviderModel::getProviders()); echo "</pre>";


echo "</br>Now delete them!</br>";

foreach ($providers as $provider){
	ProviderModel::delete($provider->idProvider);
}

$providers=ProviderModel::getProviders();
echo "</br>Printing them after Delete.No one should appear!</br>";
echo "<pre>"; print_r($providers); echo "</pre>";