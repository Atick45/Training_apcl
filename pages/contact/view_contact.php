<?php


   
   $user_id=$_SESSION["s_id"];
	include "con_db.php";   
   
   //pregnition
   $perPage = 10;
   $page = (isset($_GET['pagination'])) ? (int)$_GET['pagination'] : 1;
   
   $startAt = $perPage * ($page - 1);
   $rs=$db->query("SELECT COUNT(*) FROM {$ext_new}contact_book");
   
   list($total)= $rs->fetch_row();
	$totalPages = ceil($total / $perPage);
	
	 $con_table=$db->query("select name,phone,email,address from {$ext_new}contact_book cb LIMIT $startAt, $perPage");
	 
	  echo "<table class='table' border='1px'>";
	  echo "<h2  class='text-center'>Customer Form</h2>";
	   echo "<thead class='text-white bg-secondary'><tr><th>Name</th><th>Phone<th>Email</th><th>Address</th></tr></thead>";
	   
	      while(list($_name,$_phone,$_email,$_address)=$con_table->fetch_row()){
	 	   
	      echo "<tr><td>$_name</td><td>$_phone</td><td>$_email</td><td>$_address</td></tr>";  
		  }
	  echo "</table>";
	  
	  echo print_pagination($page,$totalPages,3);
	  
	  
?>