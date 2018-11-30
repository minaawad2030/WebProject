<?php
  include('database/database.php');
  SESSION_START();
  if(isset($_POST['submit']))
  {
   $total=(float)$_SESSION['totalSales'];
   $cash=(float) $_POST['cash'];
   if($total>$cash)
   {
    header("Location: ".$_SERVER['HTTP_REFERER']."?error=1");// go back to index with an error message
   }
   else
   {
      if(isset($_GET['error'])){
          header("Location: index.php");

      }
      $change=$cash-$total;
        $insert="INSERT INTO sales (SellerName,Date) VALUES ('".$_SESSION['name']."','".date("Y-m-d h:i:sa")."');";
        $lastID=$db->lastInsertRow($insert,array());
        

      //Update QTY Items in Items table ( STOCK )
      foreach($_SESSION['cart'] as $key=>$value)
      {
         $query="SELECT Quantity FROM products WHERE ID=".$key.";";
         $result=$db->getRow($query,array());
         $newqty=(int)$result[0]-((int)$_SESSION['cart'][$key]['qty']-1);
         $update="UPDATE products SET Quantity=".$newqty." WHERE ID=".$key.";";
         $db->updateRow($update,array());
         $insertItems="INSERT INTO receiptitems (itemID,itemName,itemQty,itemPrice,ReceiptID) VALUES
         ('".$key."','".$_SESSION['cart'][$key]['name']."','".((int)$_SESSION['cart'][$key]['qty']-1)."','".$_SESSION['cart'][$key]['price']."','".$lastID."');";
         $db->insertRow($insertItems,array());
      }
      echo "<script>alert('Change $change' );</script>"; // CASH Back
     
      unset($_SESSION['cart']);
      unset($_SESSION['total']);
      echo "<script>window.location.href = 'index.php';</script>";// Go back to index
   }

  }
?>
