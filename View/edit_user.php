<?php
require_once "vcc.php" ;
$username = addslashes($_POST['username']) ;
$password = addslashes($_POST['password']) ;
$email = addslashes($_POST['e_mail']) ;
$role = addslashes($_POST['role']) ;
$id = $user->id ;
edit_user($username, $password, $email, $role) ;
$_SESSION['section'] = "users" ;
header("Location: ./index.php") ;
?>
