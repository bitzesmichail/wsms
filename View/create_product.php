<?php
require_once "vcc.php" ;
$sku = addslashes($_POST['sku']) ;
$description = addslashes($_POST['description']) ;
$priceSupply = addslashes($_POST['priceSupply']) ;
$priceSale = addslashes($_POST['priceSale']) ;
$criticalSum = addslashes($_POST['criticalSum']) ;
create_product($sku, $description, $priceSupply, $priceSale, $criticalSum) ;
$_SESSION['section'] = "products" ;
header("Location: ./index.php") ;
?>
