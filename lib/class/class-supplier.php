<?php
class Supplier{
	private $name;
	private $phone;
	private $desc;
	private $userid;
	private $address;
	private $cur_date;
	
	 public function __construct($_sname,$_sphone,$_sdesc,$_daddress,$_userid,$cur_date=""){
		
		$this->name=$_sname;
		$this->phone=$_sphone;
		$this->desc=$_sdesc;
		$this->userid=$_userid;
		$this->address=$_daddress;
		$this->cur_date=date("Y-m-d H:i:s");
	}
	public function valid(){
		if(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->name)){
			return "<span class='text-danger'>Name is not valid</span>";
		}elseif(!preg_match("/^[0-9 +.-_]{4,}$/",$this->phone)){
			return "<span class='text-danger'>Phone is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z0-9 .-_]{4,}$/",$this->desc)){
			return "<span class='text-danger'>Description is not valid</span>";
		}else{
			return "true";
		}		
	 }
	 public function save(){
		global $db,$ext_new; 
		
		$db->query("insert into {$ext_new}supplier(name, Address, phone, description, user_id, date)values('$this->name','$this->address','$this->phone','$this->desc','$this->userid','$this->cur_date')");
		 return $db->insert_id; 
	}
	 public function update($_id){
		global $db,$ext_new;
		
		$result = $db->query("update {$ext_new}supplier set  name='$this->name', Address='$this->address',phone='$this->phone', user_id='$this->user_id',date='$this->cur_date' where id='$_id'");
		return $result;
		
	 }
	 
	  public static function delete($_id){
		 global $db,$ext_new;
		 $db->query("delete from {$ext_new}supplier where id='$_id'");
	 }
	 
	 
	
	// this the supplier view
	public static function view_supplier(){
		global $db,$ext_new; 
		
		echo "<table class='table table-border table-striped' >";
		echo "<tr> 
				<th>id</th>
				<th>name</th>
				<th>address</th>
				<th>Phone</th>
				<th>Description</th>
				<th>User</th>
				<th>Date</th>
			</tr>";
		
		$result =$db->query("select sup.id, sup.name, sup.Address, sup.phone, sup.description, u.name, sup.date from {$ext_new}supplier sup, {$ext_new}user u where u.id=sup.user_id order by sup.id asc ");
		
		while(list($id, $name, $Address, $phone, $description, $user_name, $date)=$result->fetch_row()){
			$date_format = date("d-m-Y",strtotime($date)); 
			echo "<tr> 
				<td>$id</td>
				<td>$name</td>
				<td>$Address</td>
				<td>$phone</td>
				<td>$description</td>
				<td>$user_name</td>
				<td>$date_format</td>
			</tr>";
			
		}
		
		echo "</table>";
		
		
	}
	
	public static function manage_supplier(){
		global $db,$ext_new; 
		
		echo "<table class='table table-border table-striped' >";
		echo "<tr> 
				<th>id</th>
				<th>name</th>
				<th>address</th>
				<th>Phone</th>
				<th>Description</th>
				<th>User</th>
				<th>Date</th>
				<th>Options</th>
			</tr>";
		
		$result =$db->query("select sup.id, sup.name, sup.Address, sup.phone, sup.description, u.name, sup.date from {$ext_new}supplier sup, {$ext_new}user u where u.id=sup.user_id order by sup.id asc ");
		
		while(list($id, $name, $Address, $phone, $description, $user_name, $date)=$result->fetch_row()){
			$date_format = date("d-m-Y",strtotime($date)); 
			echo "<tr> 
				<td>$id</td>
				<td>$name</td>
				<td>$Address</td>
				<td>$phone</td>
				<td>$description</td>
				<td>$user_name</td>
				<td>$date_format</td>
				<td><form action='#' method='post' style='display:inline'>
						<input type='hidden' name='txtId' value='$id' />
						
						<input type='submit' name='btnEdit' class='material-icons text-primary' value='edit'>
						</form>
<form action='#' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txtId' value='$id' /><input type='submit' name='btnDelete' class='material-icons text-danger' value='delete'></form></td>
			</tr>";
			
		}
		
		echo "</table>";
		
		
	}




 }
?>
