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
                           
                                
$providerObj1 = new Provider("alkis",
                             "kalogeris",
                             "111111111",
                             "2102102110",
                             "696969696",
			     "alkis@gmail",
                             "makariou 69",
                             "11035",
                             "athens");

$providerObj2 = new Provider("alkis",
                             "kalogeris",
                             "333333335",
                             "2102102110",
                             "696969696",
			     "alkis@gmail",
                             "makariou 69",
                             "11001",
                             "athens",
                             1);

                            
//CustomerModel::delete(3);
//ProviderModel::create($providerObj1);
//ProviderModel::update($providerObj2);
//ProviderModel::delete(1);
$result = ProviderModel::getProviders();

echo "<pre>"; print_r($result); echo "</pre>";