<?php
 session_start();
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Sales</title>
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
      	       		<a class="nav-link" href="Sales.php">Sales</a>
   			 </li>  ';
    }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>

</nav>


 <table class="table table-striped"  cellspacing="2px" cellpadding="0px" id="tb" style="color:#000000;" >

<th>Receipt ID</th>
<th>Seller Name</th>
<th>Date</th>
<th>Options</th>
   <?php
  // ALL SALES
  include('database/database.php');
  $query="SELECT* FROM sales";
  $result=$db->getRows($query,array());
  foreach($result as $key=>$vlaue){
     echo "<tr>";
     echo "<td>$key</td>";
     echo "<td>".$result[$key]['SellerName']."</td>";
     echo "<td>".$result[$key]['Date']."</td>";
     $final=$result[$key]['ReceiptID'];
     echo "<td><a href='view.php?id=$final'>View</a></td>";
     echo "</tr>";
  }

?>
</table>
</body>

</html>

