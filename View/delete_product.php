<?php
require_once "vcc.php" ;
$id = addslashes($_POST['pid']) ;
delete_product($id) ;
$_SESSION['section'] = "products" ;
header("Location: ./index.php") ;
?>
