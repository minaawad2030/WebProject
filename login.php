<?php
  include('database/database.php');
  SESSION_START();
   $error='';
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==True){
    echo '<script language="javascript">document.location.href="index.php"</script>';
}
  if(isset($_POST['submit'])){
     $username=$_POST['username'];
     $pass=$_POST['password'];

     $query="SELECT* FROM user WHERE Username='$username' AND Password='$pass';";
     $currUser=$db->getRow($query,NULL);

     if(!empty($currUser))
     {
        $_SESSION['name']=$currUser['Name'];
     	$_SESSION['isAdmin']=$currUser['IsAdmin'];
    	$_SESSION['loggedIn']=True;
       echo '<script language="javascript">document.location.href="index.php"</script>';
     }else{
       $error='<div class="alert alert-danger"><strong>Invalid Username or Password</strong></div>';
       $_SESSION['loggedIn']=False;
      }
     }
    if(isset($_GET['page'])){
     $error='<div class="alert alert-danger">Please Login to book tickets</div>';
   }


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Login</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <style>

     .center{
   background:rgba(0,0,0,0.5);
   border-radius:25px;
   top:50%;
   left:50%;
   width:500px;

   position:absolute;
   transform:translate(-50%,-50%);
   padding:10px;
  }
  </style>

</head>

<body background="background.jpg">

<div class='container'>
<div class='row'>
<div class="col-md-6 col-md-offset-3 center">
<h1 style='color:white' align='center'>Login</h1>
<?php echo $error?>
<form method='post'>
<div class='form-group'>
   <label style='color:white'>Username:</label>
   <input type='text' placeholder='Ex: mina' class='form-control' name='username' required/>
</div>
<div class='form-group'>
   <label style='color:white'>Password:</label>
   <input type='password' placeholder='********' class='form-control' name='password' required/>
</div>
<input type="submit" class="btn btn-success btn-block" name="submit" value="Login"/>
</div>

</form>
</div>
</div>
</div>

</body>

</html>
