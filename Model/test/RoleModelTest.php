<?php

require_once("RoleModel.php");
require_once("entities/Role.php");

echo "Creating all 4 Roles!</br>";
$roles=array();
$roles[0]=new Role("manager", "mpla mpla");
$roles[1]=new Role("scheduler", "mpli mpli");
$roles[2]=new Role("salesman", "mplo mplo");
$roles[3]=new Role("storage", "mple mple");

foreach ($roles as $role){
	RoleModel::create($role);
}

$roles=RoleModel::getRoles();
echo "</br>Printing them!</br>";
echo "<pre>"; print_r($roles); echo "</pre>";

echo "</br>Change Roles!</br>";

$roles[0]->__set("type", "MANAGER");
$roles[0]->__set("description", "MANAGER");
$roles[1]->__set("type", "SCHEDULER");
$roles[1]->__set("description", "SCHEDULER");
$roles[2]->__set("type", "SALESMAN");
$roles[2]->__set("description", "SALESMAN");
$roles[3]->__set("type", "STORAGE");
$roles[3]->__set("description", "STORAGE");

echo "</br>Update DataBase!</br>";

foreach ($roles as $role){
	RoleModel::update($role);
}

$roles=RoleModel::getRoles();
echo "</br>Printing them after Update!</br>";
echo "<pre>"; print_r($roles); echo "</pre>";

echo "</br>Now get Roles by their id!</br>";
foreach ($roles as $role){
	echo "<pre>"; print_r(RoleModel::getRoleById($role->__get("idRole"))); echo "</pre>";
}

echo "</br>Now get Roles by their type!</br>";
foreach ($roles as $role){
	echo "<pre>"; print_r(RoleModel::getRoleByType($role->__get("type"))); echo "</pre>";
}

echo "</br>Now Delete all Roles!</br>";
foreach ($roles as $role){
	RoleModel::delete($role->__get("idRole"));
}

echo "</br>No one left behind!</br>";
$roles=RoleModel::getRoles();
echo "<pre>"; print_r($roles); echo "</pre>";
