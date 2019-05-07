<?php
 require_once("db_config.php"); 
 $sql=file_get_contents("feed_management_Home.sql");  
 $s=$db->multi_query($sql);  
 if($s){	
   echo "Success!"; 
 }else{
	 echo "error";
 }
 ?>