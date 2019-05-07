<?php
 require_once("db_config.php"); 
 //$ext="pms_";
 $tables=$db->query("show tables");
 while(list($table)=$tables->fetch_row()){	 
	 echo $table."<br/>";	 
 }
?>
