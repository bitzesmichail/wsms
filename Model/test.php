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
require_once("entities/Role.php");
require_once("entities/Product.php");
require_once("entities/Customer.php");
require_once("entities/Provider.php");
                           
                            
$result = CustomerModel::getDiscount(1, 1);

echo "<pre>"; print_r($result); echo "</pre>";