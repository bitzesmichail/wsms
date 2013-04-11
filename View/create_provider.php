<?php
require_once "vcc.php" ;
$name = addslashes($_POST['name']) ;
$surname = addslashes($_POST['surname']) ;
$ssn = addslashes($_POST['ssn']) ;
$phone = addslashes($_POST['phone']) ;
$cellphone = addslashes($_POST['cellphone']) ;
$email = addslashes($_POST['email']) ;
$address = addslashes($_POST['address']) ;
$city = addslashes($_POST['city']) ;
$zipCode = addslashes($_POST['zipCode']) ;
create_provider($name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode) ;
$_SESSION['section'] = "providers" ;
header("Location: ./index.php") ;
?>
