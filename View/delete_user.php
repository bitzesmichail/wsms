<?php
require_once "vcc.php" ;
$id = $_POST['id'] ;
delete_user($id) ;
$_SESSION['section'] = 'users' ;
header("Location: ./index.php") ;
?>
