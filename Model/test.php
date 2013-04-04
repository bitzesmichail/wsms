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

/*
UserModel::create(new User("alkis77", "111111"));
UserModel::create(new User("alkis78", "222222"));
UserModel::create(new User("alkis79", "333333"));
UserModel::create(new User("alkis80", "444444"));
*/


//UserModel::delete('3'); //Work both
//UserModel::delete(4);  //
//UserModel::create(new User("teliko", "444444", "alkis@hotmail", array("salesman", "scheduler")));
/*
UserModel::update(new User("alkis12", "222222", "alkis@gmail", null, 2));
$user = UserModel::getUsers("1");

echo "<pre>".print_r($user)."</pre>";

$user[0]->password = "999999";

echo "<pre>"; print_r($user); echo "</pre>";
*/
/*
RoleModel::create(new Role("manager", "mpla mpla"));
RoleModel::create(new Role("scheduler", "mpli mpli"));
RoleModel::create(new Role("salesman", "mplo mplo"));
RoleModel::create(new Role("storage", "mple mple"));
*/

//RoleModel::update(new Role("manager", "trollll", 1));

//$role = UserModel::getUserById(2);
//echo "<pre>"; print_r($role); echo "</pre>";
/*
UserModel::create(new User("alkis77", "111111", "alkis@hotmail", array("scheduler")));
UserModel::create(new User("alkis78", "222222", "alkis@hotmail", array("salesman", "scheduler")));
UserModel::create(new User("alkis79", "333333", "alkis@hotmail", array("salesman", "scheduler")));
UserModel::create(new User("alkis80", "444444", "alkis@hotmail", array("salesman")));
*/
$result = UserModel::getUsers();
echo "<pre>"; print_r($result); echo "</pre>";