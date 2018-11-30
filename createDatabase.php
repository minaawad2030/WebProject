<?php
//include('database/database.php');

function createDB(){
 $host="localhost";
        $root="root";
	$root_password="";
$query="CREATE DATABASE IF NOT EXISTS cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($query);
}



function createTable(){
$host="localhost";
        $root="root";
	$root_password="";
$use="USE cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($use);
$query="CREATE TABLE IF NOT EXISTS user(
UserID int(11) PRIMARY KEY,
Name varchar(30) NOT NULL,
Username varchar(30) NOT NULL,
Password varbinary(max) NOT NULL,
IsAdmin varchar(3) NOT NULL)";


$dbh->exec($query);
}
function createTable2(){
  $host="localhost";
        $root="root";
	$root_password="";
$use="USE cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($use);
$query="CREATE TABLE IF NOT EXISTS user(
UserID int(11) PRIMARY KEY,
Name varchar(30) NOT NULL,
Username varchar(30) NOT NULL,
Password varbinary(30) NOT NULL,
IsAdmin varchar(30) NOT NULL);" ;
$dbh->exec($query);
}


function createTables($name){
      $host="localhost";
        $root="root";
	$root_password="";
$use="USE cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($use);
$query="CREATE TABLE IF NOT EXISTS $name (
ReceiptID int(11) AUTO_INCREMENT PRIMARY KEY,
SellerName varchar(30) NOT NULL,
Date DATETIME NOT NULL);";
$dbh->exec($query);
}

function createTables2($name){
      $host="localhost";
        $root="root";
	$root_password="";
$use="USE cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($use);
$query="CREATE TABLE IF NOT EXISTS $name (
ID int(11) PRIMARY KEY AUTO_INCREMENT,
itemID int(11) NOT NULL,
itemName varchar(30) NOT NULL,
itemQty int(11) NOT NULL,
itemPrice double(6,2) NOT NULL,
ReceiptID int(11) NOT NULL,
FOREIGN KEY(ReceiptID) REFERENCES sales(ReceiptID)ON DELETE CASCADE);";
$dbh->exec($query);
}



function product(){

  $host="localhost";
        $root="root";
	$root_password="";
$use="USE cart;";
$dbh = new PDO("mysql:host=$host", $root, $root_password);
$dbh->exec($use);
$query="CREATE TABLE IF NOT EXISTS products (
ID INT NOT NULL PRIMARY KEY,
Name varchar(50) NOT NULL,
Price double(10,2) NOT NULL,
Quantity INT NOT NULL);";
$dbh->exec($query);

}
product();
createDB();
createTable();
createTable2();
createTables("sales");
createTables2("receiptItems");
?>

