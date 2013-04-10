<?php
require "vcc.php" ;
$username = addslashes($_POST['username']) ;

$password = addslashes($_POST['password']) ;
$email = addslashes($_POST['e_mail']) ;
$role = $_POST['role'] ;
add_user($username, $password, $email, $role) ;
header("Location: ./") ;
?>
