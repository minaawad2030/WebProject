<?php
  include("database/database.php");
  SESSION_START();
  if(isset($_POST['submit']))
  {
     $name=$_POST['name'];
     $username=$_POST['username'];
     $pass=$_POST['pass'];
     $query="INSERT INTO `user`(`Name`, `Username`, `Password`, `IsAdmin`) VALUES ('$name','$username','$pass','False')";
     $db->insertRow($query,array());
  }
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Register New User</title>
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
<h1 class="page-header" style="color:white;" align="center">Add New User</h1>

   <form method="post">
   <div class='form-group'>
    	<label style="color:white;">Name</label>
    	<input type="text" name="name" placeholder="Name" class="form-control" required>
    </div>
    <div class='form-group'>
    	<label style="color:white;">Username</label>
    	<input type="text" name="username" placeholder="Username" class="form-control" required>
    </div>
    <div class='form-group'>
        <label style="color:white;">Password</label>
        <input type="password" name="pass" placeholder="******" class="form-control" required>
    </div>
    <input type="submit" value="Register" name="submit" class="btn btn-success btn-lg">
   </form>
   </div>
   </div>
</body>

</html>
