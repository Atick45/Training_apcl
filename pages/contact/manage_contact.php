<?php
	
	if(isset($_POST["btnupdate"])){
		$cid=$_POST["cid"];
		$name=trim($_POST["txtName"]);
		$phone=trim($_POST["txtPhone"]);
		$email=trim($_POST["txtEmail"]);
		$address=trim($_POST["txtAddress"]);
		
		$contact = new Contact ($name,$phone,$email,$address);
		$update = $contact->update($cid);
		if($update){
			echo "Contact Save Successfully";
		}else{
			echo "Contact Not Update";
		}
		
		Contact::show_manage();
	
	}elseif(isset($_POST['btncEdit'])){
		$txthId = $_POST['txthId'];
		$hname = $_POST['txthname'];
		$hphone = $_POST['txthphone'];
		$hemail = $_POST['txthemail'];
		$haddress= $_POST['txthaddress'];
	 
		include "manage_form.php";
	 
	}elseif(isset($_POST['btncDelete'])){
		 $cid = $_POST['txthId'];
		 Contact::delete($cid);
		 echo "Delete Successfully";
		 Contact::show_manage();
		 
	}else{	
	
		Contact::show_manage();
	}

?>