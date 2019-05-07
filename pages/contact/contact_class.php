<?php

class Contact{
	private $name;
	private $phone;
	private $email;
	private $address;
	private $user_id;
	
	
	function __construct($_cname,$_cphone,$_cemail,$_caddress,$user_id=""){
		
		$this->name=$_cname;
		$this->phone=$_cphone;
		$this->email=$_cemail;
		$this->address=$_caddress;
		$this->user_id=$user_id;
	}
	public function valid(){
		if(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->name)){
			return "<span class='text-danger'>Name is not valid</span>";
		}elseif(!preg_match("/^[0-9+#*]{9,}$/",$this->phone)){
			return "<span class='text-danger'>Phone is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z0-9._]{4,}[@]{1}[a-zA-Z0-9]{3,}[.]{1}[a-zA-Z0-9]{2,6}$/",$this->email)){
			return "<span class='text-danger'>Email is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z0-9 ,. @ # _ -]{0,}$/",$this->address)){
			return "<span class='text-danger'>Address is not valid</span>";
		}else{
			return "true";
		}
		
	}
	
	public function save(){
		global $db;
		global $ext_new;
		$db->query("insert into {$ext_new}contact_book(name,phone,email,address,user_id)values('$this->name','$this->phone','$this->email','$this->address','$this->user_id')");
		return $db->insert_id;
	}
	public function update($_id){
	  global $db;
	  global $ext_new;
	  $result = $db->query("update {$ext_new}contact_book set name='$this->name',phone='$this->phone',email='$this->email',address='$this->address' where id='$_id'");
	  return $result;
		 
  }
  
  public static function delete($_id){
	  
	  global $db;
	  global $ext_new;
	  $db->query("delete from {$ext_new}contact_book where id='$_id'");
	
  }
	
	
	
	public static function show_all($startAt=0, $perPage=10){	 
	 global $db,$ext_new;
	   $con_table=$db->query("select id, name,phone,email,address from {$ext_new}contact_book cb LIMIT $startAt, $perPage");
	   
	      echo "<table class='table'>";
		  
		   echo "<tr><th>Id</th><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>&nbsp;</th></tr>";
   
	   while(list($id,$name,$phone,$email,$address)=$con_table->fetch_row()){   
			
		 echo "<tr><td>$id</td><td>$name</td><td>$phone</td><td>$email</td><td>$address</td></tr>";
	   }
	   echo "</table>";
	  
	}
	
	  public static function show_manage($startAt=0, $perPage=10){	 
	 global $db,$ext_new;
	   $con_table=$db->query("select id, name,phone,email,address from {$ext_new}contact_book cb LIMIT $startAt, $perPage ");
   echo "<h3 class='text-center'>Manage Contact</h3>";
   echo "<table class='table table-striped'>";
   echo "<tr><th>Id</th><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>&nbsp;</th></tr>";
   
   while(list($id,$name,$phone,$email,$address)=$con_table->fetch_row()){   
	    
	 echo "<tr><td>$id</td><td>$name</td><td>$phone</td><td>$email</td><td>$address</td><td>
	 <form action='#' method='post' style='display:inline'>
		<input type='hidden' name='txthId' value='$id' />
		<input type='hidden' name='txthname' value='$name' />
		<input type='hidden' name='txthphone' value='$phone' />
		<input type='hidden' name='txthemail' value='$email' />
		<input type='hidden' name='txthaddress' value='$address' />
		<input type='submit' name='btncEdit' class='material-icons text-primary' value='edit'>
	</form>
<form action='#' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txthId' value='$id' /><input type='submit' name='btncDelete' class='material-icons text-danger' value='delete'></form></td></tr>";  
   }
   
   echo "</table>";
	  
	  
	  
  }

   public static function show($_id){
	  
	  global $db;
	  global $ext_new;
	  $result=$db->query("select id, name,phone,email,address from contact_book cb LIMIT $startAt, $perPage ");
	  while(list($id,$name,$phone,$email,$address)=$result->fetch_row()){
		 
      $status=	$inactive==0?"Active":"Inactive";
      echo "Id: $id <br/> Customer Name: $name <br/> Phone: $phone <br/> Email: $email <br/> Address: $address <br/> <br/>";
	   		  
	 }
	  
  }

}
?>