<?php
include('database/database.php');
 session_start();
  if(isset($_GET['id'])){
    $id=$_GET['id'];

  }
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Ticket view <?php $id?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <ul class="navbar-nav">

    <li class="nav-item" >
      <a class="nav-link" href="index.php">Home</a>
    </li>

    <?php
       if($_SESSION['isAdmin']=="True"){
   		 echo '<li class="nav-item">
      	       		<a class="nav-link" href="addNewItem.php">Add Item</a>
   			 </li>  ';
                 echo '<li class="nav-item">
      	       		<a class="nav-link" href="Sales.php">Sales</a>
   			 </li>  ';
    }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>

</nav>

   <h2>ID #<?php echo $id ?></h2>
 <table class="table table-striped"  cellspacing="2px" cellpadding="0px" id="tb" style="color:#000000;" >
     <th>No.</th>
     <th>Item ID</th>
     <th>Item Name</th>
     <th>Item Quantity</th>
     <th>Item Price</th>
     <th>Options</th>


 <?php

    $query="SELECT * FROM receiptitems WHERE ReceiptID=".$id.";";
      $result=$db->getRows($query,array());
      $total=0;//Total price
      $count=1;
      echo "<form>"  ;
      foreach($result as $key=>$value){
       echo"<tr>";
       echo"<td>$count</td>";
       echo"<td>".$result[$key]['itemID']."</td>";
       echo"<td>".$result[$key]['itemName']."</td>";
       echo"<td><input type='number' min='1' max='".$result[$key]['itemQty']."' value='".$result[$key]['itemQty']."' name='itm_$count'/></td>";
       echo"<td>".$result[$key]['itemPrice']."</td>";
       $qty=$result[$key]['itemQty'];
       $itemID=$result[$key]['itemID'];
       $total+=(double)$result[$key]['itemPrice']*(int)$result[$key]['itemQty'];
       echo"<td><a href='DeleteFromReceipt.php?receiptID=$id&itemID=$itemID&itemQty=$qty'>Delete</a>
       </td>";
       echo"</tr>";
       $count++;
      }

     ?>
</table>
      <?php echo
    "<pre style='font-size:18px;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;text-align:center;'>Total Sales : <b>".$total." L.E.</b></pre>";
      echo "<input type='hidden' name='id' value='$id' />";//to add the id of TICKET
      echo "<input type='submit' value='Qty Update' name='qtyUpdate' id='btnSubmit' class='btn btn-success btn-lg' style='float:right; margin-right:50px; padding:10px 30px ;'>";
      echo "</form>";
    ?>


<?php // if the Done is clicked
 if(isset($_GET['qtyUpdate']))
 {
   $itmNo=1;
   foreach ($result as $key=>$value)
   {
      $qty=$_GET['itm_'.$itmNo];

      if($result[$key]['itemQty']==$qty)
      {

      }
      else{
       echo $itmNo;
       echo      $result[$key]['itemID'];
       $query="UPDATE receiptitems SET itemQty='".$qty."' WHERE ReceiptID=".$id." AND itemID='".$result[$key]['itemID']."';";
       $db->myExec($query);
      }
      $itmNo++;


   }


   $itmNo=1;

   echo "<meta http-equiv='refresh' content='0;URL=http://localhost/test/view.php?id=$id' />";
 }

?>


</body>

</html>
