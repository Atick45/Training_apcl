<?php

include("lib/class/class-supplier.php");
$edit = TRUE;
if (isset($_POST["btnupdate"])){
	 $sup_id=$_POST["sup_id"];
	 
	 $supname=trim($_POST["txtName"]);
	 $supphone=trim($_POST["txtPhone"]);
	 $supdesc=trim($_POST["txtDesc"]);
	 $supadd=trim($_POST["txtAddress"]);
	 
	 $user_id=$_SESSION["s_id"];
	 
	  $result = new Role($supname,$supphone,$supdesc,$supadd);
	  $update  = $result->update($sup_id);
	  if($update){
			$message = "Supplier Updated successfully"; 
	  }
	  
	 	 
 }
 if(isset($_POST['btnEdit'])){
	 $txtId = $_POST['txtId'];
	 
	 include("pages/supplier/edit_sup_form.php");
	 $edit = FALSE;
	
	 
	
 }
 if(isset($_POST['btnDelete'])){
	 $sid = $_POST['txtId'];
	 Supplier::delete($sid);
	 echo "Delete Successfully";
 }
 
 if($edit){
	echo isset($message)?$message:"";		
	Supplier::manage_supplier();
 }





?>