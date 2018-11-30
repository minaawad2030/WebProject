<?php
  include("database/database.php");
  SESSION_START();
  if(isset($_POST['submit'])){
     $id=$_POST['ID'];
     $name=$_POST['name'];
     $price=$_POST['price'];
     $qty=$_POST['qty'];
     $query="INSERT INTO products (ID,Name,Price,Quantity) VALUES('$id','$name','$price','$qty');";

     $db->insertRow($query,array());
  }
?>


<!DOCTYPE HTML>
<html>

<head>
  <title>Add a new Item</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<style>

 .center{
      background-color:rgba(0,0,0,0.25);
      border-radius:25px;
      padding:15px;
      left:50%;
      top:50%;
      position:absolute;
      transform:translate(-50%,-50%);
  }

</style>
</head>

<body background="background.jpg">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item" >
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addNewItem.php">Add Item</a>
    </li>
    <li class="nav-item">
    	<a class="nav-link" href="sales.php">Sales</a>
   	 </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
   	 </li>
     <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>

</nav>
<div class="container">
<div class="center">
<h1 class="page-header" style="color:white;" align="center">Add a New Item</h1>

   <form method="post">
   <div class='form-group'>
    	<label style="color:white;">ID</label>
    	<input type="text" name="ID" placeholder="Item ID" class="form-control" required>
    </div>
    <div class='form-group'>
    	<label style="color:white;">Name</label>
    	<input type="text" name="name" placeholder="Item Name" class="form-control" required>
    </div>
    <div class='form-group'>
        <label style="color:white;">Price</label>
        <input type="number" name="price" placeholder="Item Price" class="form-control" step=0.01 required>
    </div>
        <div class='form-group'>
            <label style="color:white;">Quantity</label>
             <input type="number" name="qty" placeholder="Item Quantity" class="form-control" required>
        </div>
    <input type="submit" value="Add Item" name="submit" class="btn btn-success btn-lg">
   </form>
   </div>
   </div>
</body>

</html>
