<?php

require_once("../RoleModel.php");
require_once("../UserModel.php");
require_once("../entities/User.php");
require_once("../entities/Role.php");


echo "Creating 100 users!</br>";
for($i=0;$i<100;$i++){
	UserModel::create(new User("alkis".$i,"testpass","alkis@gmail.com","MANAGER"));
}

$users=UserModel::getUsers();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($users); echo "</pre>";


echo "</br>Change the users!</br>";
foreach ($users as $user){
	$user->password="second_test_pass";
	$user->email="giwrgos@gmail.com";
}
echo "</br>Update the db for changes!</br>";
foreach ($users as $user){
	UserModel::update($user);
}
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r(UserModel::getUsers()); echo "</pre>";


echo "</br>Now delete them!</br>";

foreach ($users as $user){
	UserModel::delete($user->idUser);
}

$users=UserModel::getUsers();
echo "</br>Printing them after Delete.No one should appear!</br>";
echo "<pre>"; print_r($users); echo "</pre>";