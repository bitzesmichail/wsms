<?php

require_once("UserModel.php");
require_once("RoleModel.php");
require_once("SaleOrderModel.php");
require_once("SupplyOrderModel.php");
require_once("ProductModel.php");
require_once("ProviderModel.php");
require_once("CustomerModel.php");
require_once("NotificationModel.php");
require_once("WishProductModel.php");

require_once("entities/User.php");


$userModel = new UserModel();

$user = array('username' => 'alkis',
              'password' => '111111',
              'email' => 'alkis@gmail');

$userModel->create(new User($user));

/*
$roleModel = new RoleModel();
$saleOrderModel = new SaleOrderModel();
$supplyOrderModel = new SupplyOrderModel();
$productModel = new ProductModel();
$providerModel = new ProviderModel();
$customerModel = new CustomerModel();
$notificationModel = new NotificationModel();
$wishProductModel = new WishProductModel();
*/