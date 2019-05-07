<?php
   
   $user_id=$_SESSION["s_id"];
	
	include "con_db.php";   
	
   //pregnition
    $perPage = 10;
	$page = (isset($_GET['pagination'])) ? (int)$_GET['pagination'] : 1;


	$startAt = $perPage * ($page - 1);
	 
	 
	$rs=$db->query("SELECT COUNT(*) FROM {$ext_new}user");
	list($total)= $rs->fetch_row();
	$totalPages = ceil($total / $perPage);
   
   $con_table=$db->query("select u.id,u.name ,r.name role from {$ext_new}user u,{$ext_new}role r where r.id=u.role_id LIMIT $startAt, $perPage");
   
   echo "<table class='table' border='1px'>";
   echo "<h2  class='text-center'>User Form</h2>";
   
   echo "<thead class='text-white bg-secondary'><tr><th>Id</th><th>Name</th><th>Role</th></tr></thead>";
   
   while(list($_id,$_name,$_role)=$con_table->fetch_row()){
	 	   
	 echo "<tr><td>$_id</td><td>$_name</td><td>$_role</td></tr>";  
   }
   
   echo "</table>";
   
   echo print_pagination($page,$totalPages,6);





   
   
?>
   
