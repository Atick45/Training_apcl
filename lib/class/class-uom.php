<?php
class Uom{
	private $name;
	private $desc;
	private $userid;
	//private $cur_date;
	
	public function __construct($_sname,$_sdesc,$_userid){
		
		$this->name=$_sname;
		$this->desc=$_sdesc;
		$this->userid=$_userid;
		//$this->cur_date=date("Y-m-d H:i:s");
	}
	
	public function valid(){
		if(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->name)){
			return "<span class='text-danger'>Name is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z0-9 .-_]{4,}$/",$this->desc)){
			return "<span class='text-danger'>Description is not valid</span>";
		}else{
			return "true";
		}		
	}
	public function save(){
		global $db,$ext_new; 
		
		$db->query("insert into {$ext_new}uom(name, description, user_id )values('$this->name','$this->desc','$this->userid')");
		return $db->insert_id;
	}
	
	public function update($_id){
		global $db,$ext_new;
		
		$result = $db->query("update {$ext_new}uom set  name='$this->name', description='$this->desc', user_id='$this->userid' where id='$_id'");
		return $result;
		
	 }
	 
	 public static function delete($_id){
		 global $db,$ext_new;
		 $db->query("delete from {$ext_new}uom where id='$_id'");
	 }
	
	
	public static function view_uom(){
		
		global $db,$ext_new; 
		
		echo "<table class='table table-border table-striped' >";
		echo "<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Date</th>
					<th>User</th>
			  </tr>";
				
		$result = $db->query("select um.id, um.name, um.description, um.date, u.name from {$ext_new}uom um,{$ext_new}user u where u.id=um.user_id order by um.id desc");
		
		while(list($id, $name, $description, $date, $user_id)=$result->fetch_row()){
			$date_format = date("d-m-Y",strtotime($date));
			echo "<tr>
					<td>$id</td>
					<td>$name</td>
					<td>$description</td>
					<td>$date</td>
					<td>$user_id</td>
				</tr>";
		}
		echo "</table>";
	}
	
	public static function manage_uom(){
		global $db,$ext_new; 
		
		echo "<table class='table table-border table-striped' >";
		echo "<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Date</th>
					<th>User</th>
					<th>Options</th>
			  </tr>";
				
		$result = $db->query("select um.id, um.name, um.description, um.date, u.name from {$ext_new}uom um,{$ext_new}user u where u.id=um.user_id order by um.id desc");
		
		while(list($id, $name, $description, $date, $user_id)=$result->fetch_row()){
			$date_format = date("d-m-Y",strtotime($date));
			echo "<tr>
					<td>$id</td>
					<td>$name</td>
					<td>$description</td>
					<td>$date_format</td>
					<td>$user_id</td>
					<td><form action='#' method='post' style='display:inline'>
						<input type='hidden' name='txtId' value='$id' />
						<input type='hidden' name='txtUomclsname' value='$name' />
						<input type='hidden' name='txtUomclsdesc' value='$description' />
					
						<input type='submit' name='btnEdit' class='material-icons text-primary' value='edit'>
						</form>
<form action='#' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txtId' value='$id' /><input type='submit' name='btnDelete' class='material-icons text-danger' value='delete'></form></td></tr>";
		}
		echo "</table>";
		
	}
	
}





?>
