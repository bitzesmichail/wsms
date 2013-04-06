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
                           
                                
$customerObj1 = new Customer("alkis",
                             "kalogeris",
                             "111111111",
                             "2102102110",
                             "696969696",
			     "alkis@gmail",
                             "makariou 69",
                             "11035",
                             "athens");

$customerObj2 = new Customer("alkis",
                             "kalogeris",
                             "444444444",
                             "2102102110",
                             "696969696",
			     "alkis@gmail",
                             "makariou 69",
                             "11035",
                             "athens",
                             3);

                            
//CustomerModel::delete(3);
//CustomerModel::create($customerObj2);
//ProductModel::delete(4);
$result = CustomerModel::getCustomers();

echo "<pre>"; print_r($result); echo "</pre>";