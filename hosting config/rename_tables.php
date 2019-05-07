<?php
 require_once("db_config.php");
global $db; 
 //$ext_old="core_";
 $ext_new="mfg_";
 
 
 $tables=$db->query("show tables");
 while(list($table)=$tables->fetch_row()){	 
  $db->query("rename table $table TO {$ext_new}$table");
 }
 echo "Success!";
 

?>
