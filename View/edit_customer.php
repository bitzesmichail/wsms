<?php
require_once "vcc.php" ;
$id = $_POST['cid'] ;
$name = addslashes($_POST['name']) ;
$surname = addslashes($_POST['surname']) ;
$ssn = addslashes($_POST['ssn']) ;
$phone = addslashes($_POST['phone']) ;
$cellphone = addslashes($_POST['cellphone']) ;
$email = addslashes($_POST['email']) ;
$address = addslashes($_POST['address']) ;
$city = addslashes($_POST['city']) ;
$zipCode = addslashes($_POST['zipCode']) ;
edit_customer($id, $name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode) ;
$_SESSION['section'] = "customers" ;
header("Location: ./index.php") ;
?>
