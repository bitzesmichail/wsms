<?php
require_once "vcc.php" ;
$id = addslashes($_POST['cid']) ;
delete_provider($id) ;
$_SESSION['section'] = "providers" ;
header("Location: ./index.php") ;
?>
