<?php
  include("database/database.php");
  SESSION_START();
  $totalSales=0;
  $error="";
   if(isset($_GET['error'])){
     if($_GET['error']=='1'){
 	  echo "<div class='alert alert-danger'><strong>Cash is less than total!</strong></div>";
          }
   }

   if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==1){
     $name=$_SESSION['name'];

   }else{
     header('Location:login.php');

   }
  if(isset($_POST['submit'])){
     $id=$_POST['barcode'];      // item id
     $query="SELECT * FROM products WHERE ID=$id;";
     $result=$db->getRow($query,array());
     if($result=="") {
       $error="<div class='alert alert-danger'><strong>Item is not in database!</strong></div>";

     }

  }
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>SIMPLE POS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>



<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!-- Links -->

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
      	       		<a class="nav-link" href="sales.php">Sales</a>
   			 </li>  ';
                  echo '<li class="nav-item">
      	       		<a class="nav-link" href="register.php">Register</a>
   			 </li>  '   ;
    }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>

</nav>
   <?php  echo "<p style='text-align:center; font-size:'18px''>Welcome, $name</p>";  ?>
<br/>

<form action="index.php" method="post">
   <label>Item ID</label>    <input type="text" name="barcode" class="form-item" onmouseover="this.focus();" required>
   <input type="submit" name="submit">
</form>

<?php
   if($error !=""){
     echo $error;

   }
 ?>

      <table class="table table-striped"  cellspacing="2px" cellpadding="0px" id="tb" style="color:#000000;" >
      <th>Item ID</th>
      <th>Item Name</th>
      <th>Unit Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Delete</th>

<?php

   if(!empty($result))
   {
     if(empty($_SESSION['cart']))
     {
     	$_SESSION['cart']=array($result["ID"]=>array("name"=>$result['Name'],"price"=>$result['Price'],"qty"=>1,"total"=>$result['Price']));

     }else
     {
    	$_SESSION['cart']=$_SESSION['cart']+array($result["ID"]=>array("name"=>$result['Name'],"price"=>$result['Price'],"qty"=>1,"total"=>$result['Price']));

     }
      foreach($_SESSION['cart'] as $key=>$items)
      {
       if($key==$result['ID']){

         $_SESSION['cart'][$result['ID']]['qty']=(int)$items['qty']+1;
         $_SESSION['cart'][$result['ID']]['total']=(float)$items['price']*(int)$items['qty'];
       }
      }
      foreach($_SESSION['cart'] as $key=>$items){
      echo"<tr>";
      echo'<td>'.$key.'</td>';
      echo'<td>'.$items["name"].'</td>';
      echo'<td>'.$items["price"].'</td>';
      echo'<td>'.(int)($items['qty']-1).'</td>';
      echo'<td>'.$items["total"].'</td>';
      echo"<td><a href='del.php?key=$key'>Delete</a> </td>";
       $totalSales=(float)$totalSales+(float)$items['total'];
        $_SESSION['totalSales']= $totalSales;
      echo"</tr>";
      }

      }else
      {
      if(!empty($_SESSION['cart'])){
         foreach($_SESSION['cart'] as $key=>$items){
      echo"<tr>";
      echo'<td>'.$key.'</td>';
      echo'<td>'.$items["name"].'</td>';
      echo'<td>'.$items["price"].'</td>';
      echo'<td>'.(int)($items['qty']-1) .'</td>';
      echo'<td>'.$items["total"].'</td>';
     echo"<td><a href='del.php?key=$key'>Delete</a> </td>";
      $totalSales=(float)$totalSales+(float)$items['total'];
       $_SESSION['totalSales']= $totalSales;
      echo"</tr>";
      }

      }
     }



  ?>

  </table>

  <form method='post' action="review.php">
     <p style='text-align:right; float:right;'>Cash<input type='number' step="0.01" class="form-item" name="cash" style='float:right; margin-right:50px;display:inline-block;'required></p>
    <?php echo
    "<pre style='font-size:18px;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;text-align:center;'>Total Sales : <b>".$totalSales." L.E.</b></pre>";

    ?>

    <input type='submit' value='Done' name='submit' class='btn btn-success btn-lg' style="float:right; margin-right:50px; padding:10px 30px ;">

 </form>

</body>

</html>
