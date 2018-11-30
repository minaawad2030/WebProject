<?php


function createDB(){
 $host="localhost";
        $root="root";
	$root_password="";
$query="CREATE DATABASE IF NOT EXISTS cart;";
$db = new PDO("mysql:host=$host", $root, $root_password);
$db->exec($query);
}

createDB();
?>

