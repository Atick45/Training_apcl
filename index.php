<?php session_start();

include "con_db.php";
 
 if(isset($_POST["btnLogin"])){
	$username=trim($_POST["txtUsername"]);
	$password=trim($_POST["txtPassword"]);
	
	
   //connection to database 
   $user_table=$db->query("select id,name,password from {$ext_new}user where name='$username' and password='$password'");
   
  list($id,$_username,$_password)=$user_table->fetch_row();
  
	if(isset($id)){
	    $_SESSION["s_id"]=$id;
	    $_SESSION["s_username"]=$_username;	
		header("location:home.php");
	}else{
	   $error="<span style='color:red;'>Incorrect username or password</span>";	
	}
	
 }

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/log.css">
</head>
<body id="loginBody">
 <div><?php echo isset($error)?$error:"";?></div>
 
	<div class="login-box">
	<img src="./img/login.png" class="logpng">
	<div style='color:Green;'>Welcome to feed manufacturing soft</div>
		<form action="#" method="post">
			<div>Username<br/>
			<input type="text" name="txtUsername" placeholder="Enter user name"/>
			</div>
			<div>Password<br/>
			<input type="password" name="txtPassword" placeholder="Enter user password"/>
			</div>
			<input type="submit" name="btnLogin" value="Log In"/>
			<a href="#">Forgot your password</a>
		</form>
	
	</div>
</body>
</html>