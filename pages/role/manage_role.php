<?php
 include("lib/class/class-role.php");
 $edit = TRUE;
 
 if (isset($_POST["btnupdate"])){
	 $role_id=$_POST["role_id"];
	 
	 $rolename=trim($_POST["txtrName"]);
	 $descrip=($_POST["txtRdesc"]);
	 
	 $user_id=$_SESSION["s_id"];
	 
	  $result = new Role($rolename,$descrip,$user_id);
	  $update  = $result->update($role_id);
	  if($update){
			$message = "Role Updated successfully"; 
	  }
	  
	 	 
 }
 
 if(isset($_POST['btnEdit'])){
	 $txtId = $_POST['txtId'];
	 $rolename = $_POST['txtrclsname'];
	 $descrip = $_POST['txtrclsdesc'];
	 
	 include("pages/role/edite_role.php");
	 $edit = FALSE;
	
 } 
 
 if(isset($_POST['btnDelete'])){
	 $rid = $_POST['txtId'];
	 Role::delete($rid);
	 echo "Delete Successfully";
 } 

 
 if($edit){
	echo isset($message)?$message:"";		
	Role::manage_role();
 }
	



?>