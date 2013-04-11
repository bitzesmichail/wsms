<?php
require_once "vcc.php" ;
$id = addslashes($_POST['cid']) ;
delete_customer($id) ;
$_SESSION['section'] = "customers" ;
header("Location: ./index.php") ;
?>
