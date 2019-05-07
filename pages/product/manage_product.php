<?php
	 
require_once "lib/class/class-product.php";




if(isset($_POST['btnedit'])){
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$manufacturer = $_POST['manufacturer'];
	$description = $_POST['description'];
	$ptid = $_POST['ptid'];
	$umid = $_POST['umid'];
	$photo = $_POST['photo'];
	
	
	include "manage_form.php";
	
	$dnone = "d-none";
	
}
if(isset($_POST['btndelte'])){
	$pid = $_POST['pid'];
	Product::delete($pid);
}

?>











<div class="<?php echo isset($dnone)?$dnone:"" ?>"> 

<?php

Product::show_manage();
   
?>


</div>


