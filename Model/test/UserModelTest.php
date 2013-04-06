<?php

require_once("../RoleModel.php");
require_once("../UserModel.php");
require_once("../entities/User.php");
require_once("../entities/Role.php");

echo "Creating all 4 Roles!</br>";

$roles=array();
$roles[0]=new Role("manager", "mpla mpla");
$roles[1]=new Role("scheduler", "mpli mpli");
$roles[2]=new Role("salesman", "mplo mplo");
$roles[3]=new Role("storage", "mple mple");

foreach ($roles as $role){
	RoleModel::create($role);
}
$dbroles=RoleModel::getRoles();
echo "</br>Printing them!</br>";
print_r($dbroles);

$rolesIds= array();
foreach ($dbroles as $role){
	$rolesIds[]= $role->__get("idRole");
}

echo "Creating 100 users!</br>";
for($i=0;$i<100;$i++){
	UserModel::create(new User("alkis".$i,"testpass","alkis@gmail.com",$roles));
}

$users=UserModel::getUsers();
echo "</br>Printing them!</br>";
print_r($users);

echo "</br>Change the users!</br>";
foreach ($users as $user){
	$user->__set("password","second_test_pass");
	$user->__set("email","giwrgos@gmail.com");
}
echo "</br>Update the db for changes!</br>";
foreach ($users as $user){
	UserModel::update($user);
}
echo "</br>Printing them after Update!</br>";
print_r(UserModel::getUsers());

echo "</br>Now delete them!</br>";

foreach ($users as $user){
	UserModel::delete($user->__get("idUser"));
}
echo "</br>Now delete Roles!</br>";
foreach ($rolesIds as $id){
	RoleModel::delete($id);
}
$users=UserModel::getUsers();
echo "</br>Printing them after Delete.No one should appear!</br>";
print_r($users);