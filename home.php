<?php session_start();
if(!isset($_SESSION["s_username"])){
	   header("location:index.php");
   }
require_once("con_db.php");
require_once("pages/user/user_class.php");
require_once("pages/contact/contact_class.php");
require_once("lib/class/class-product.php");
require_once("lib/class/class-purchase.php");
require_once("lib/class/class-product_type.php");
require_once("pagination.php");

   date_default_timezone_set("Asia/Dhaka");
   
   
  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
 <link href="css/sticky-footer-navbar.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>


  
  <?php include("header.php")?>
 
  <div class="container" style="margin-top:70px;">
   <?php
       include("placeholder.php");
   ?>
  </div>

  <?php include("footer.php") ?>
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script>
	$(function(){
		var autoheight = $(window).innerHeight();
		$("#loginBody").css("height",autoheight);
		
	});
   </script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>