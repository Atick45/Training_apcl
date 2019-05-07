<?php

 class Role{
	 private $rname;
	 private $desc;
	 private $user_id;
	 
	 function __construct($_rname,$_desc,$user_id=""){
		$this->rname=$_rname; 
		$this->desc=$_desc; 
		$this->user_id=$user_id; 
		//$this->cur_date = date("Y-m-d H:i:s");		
	 }
	 public function valid(){
		if(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->rname)){
			return "<span class='text-danger'>Name is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->desc)){
			return "<span class='text-danger'>Description is not valid</span>";
		}else{
			return "true";
		}		
	 }
	 
	 
	 public function save(){
		global $db; 
		global $ext_new;
		$db->query("insert into {$ext_new}role(name, description)values('$this->rname','$this->desc')");
		return $db->insert_id; 
	 }

	 public function update($_id){
		global $db,$ext_new;
		
		$result = $db->query("update {$ext_new}role set  name='$this->rname', description='$this->desc', user_id='$this->user_id' where id='$_id'");
		return $result;
		
	 }
	 
	 public static function delete($_id){
		 global $db,$ext_new;
		 $db->query("delete from {$ext_new}role where id='$_id'");
	 }
	 
	 
	 
	 
	 
	 //this is the role view
	 public static function view_role(){
		 global $db,$ext_new; 
		 
		 echo "<table class='table table-border table-striped' >";
		 echo "<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>User</th>
					<th>Date</th>
			   </tr>";
	
		 $result =$db->query("select rle.id, rle.name, rle.description, u.name, rle.date from {$ext_new}role rle,{$ext_new}user u where u.id= rle.user_id order by rle.id asc");
		 
		 while(list($id, $name, $description, $user_name, $date)=$result->fetch_row()){
			 $date_format= date ("d-m-Y",strtotime($date));
			 echo "<tr>
						<td>$id</td>
						<td>$name</td>
						<td>$description</td>
						<td>$user_name</td>
						<td>$date_format</td>
				</tr>";
			 
		 }
		 
		 echo "</table>";
		 
	 }
	 
	   public static function manage_role(){	 
	 global $db,$ext_new; 
		 
		 echo "<table class='table table-border table-striped' >";
		 echo "<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>User</th>
					<th>Date</th>
					<th>Options</th>
			   </tr>";
	
		 $role_table =$db->query("select rle.id, rle.name, rle.description, u.name, rle.date from {$ext_new}role rle,{$ext_new}user u where u.id= rle.user_id order by rle.id asc");
		 
		 while(list($id, $name, $description, $user_name, $date)=$role_table->fetch_row()){
			 $date_format= date ("d-m-Y",strtotime($date));
			 echo "<tr>
						<td>$id</td>
						<td>$name</td>
						<td>$description</td>
						<td>$user_name</td>
						<td>$date_format</td>
						<td><form action='#' method='post' style='display:inline'>
						<input type='hidden' name='txtId' value='$id' />
						<input type='hidden' name='txtrclsname' value='$name' />
						<input type='hidden' name='txtrclsdesc' value='$description' />
					
						<input type='submit' name='btnEdit' class='material-icons text-primary' value='edit'>
						</form>
<form action='#' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txtId' value='$id' /><input type='submit' name='btnDelete' class='material-icons text-danger' value='delete'></form></td></tr>";  
   }
   
   echo "</table>";
	  
	  
	  
  }
 }




?>
