<?php
include('database/database.php');
$receiptID=$_GET['receiptID'];
$itemID=$_GET['itemID'];
$itemQty=$_GET['itemQty'];

$query="DELETE FROM receiptitems where ReceiptID=$receiptID AND itemID=$itemID";
$db->myExec($query);


header("Location: ".$_SERVER['HTTP_REFERER'] );
exit();
?>
