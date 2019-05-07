<?php

include("lib/class/class-uom.php");
$edit = TRUE;
if(isset($_POST["btnupdate"])){
	$uom_id=trim($_POST["uom_id"]);
	
	$uom_name=trim($_POST["txtUOMName"]);
	$descrip=trim($_POST["txtDescribe"]);
	
	$user_id=$_SESSION["s_id"];
	
	$result = new Uom($uom_name,$descrip,$user_id);
	$update  = $result->update($uom_id);
	  if($update){
			$message = "Role Updated successfully"; 
	  }
}
if(isset($_POST['btnEdit'])){
	 $txtId = $_POST['txtId'];
	 $uom_name = $_POST['txtUomclsname'];
	 $descrip = $_POST['txtUomclsdesc'];
	 
	 include("pages/uom/edit_uom_form.php");
	 $edit = FALSE;
	
 } 
 if(isset($_POST['btnDelete'])){
	 $uid = $_POST['txtId'];
	 Uom::delete($uid);
	 echo "Delete Successfully";
 } 
 if($edit){
	echo isset($message)?$message:"";		
	Uom::manage_uom();
 }









?>