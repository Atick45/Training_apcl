<?php
class Pdtype{
	public $name;
	public $desc;
	public $userid;
	//public $cur_date;
	
	 public function __construct($_sname,$_sdesc,$_userid){
		
		$this->name=$_sname;
		$this->desc=$_sdesc;
		$this->userid=$_userid;
		//$this->cur_date=date("Y-m-d H:i:s");
	}
	 
	 public function valid(){
		if(!preg_match("/^[a-zA-Z .-_]{4,}$/",$this->name)){
			return "<span class='text-danger'>Name is not valid</span>";
		}elseif(!preg_match("/^[a-zA-Z0-9 .,/-_]{4,}$/",$this->desc)){
			return "<span class='text-danger'>Description is not valid</span>";
		}else{
			return "true";
		}		
	 }
	 
	 public function save(){
		global $db,$ext_new; 
		$db->query("insert into {$ext_new}product_type( name, description, user_id)values('$this->name','$this->desc','$this->userid')");
		 return $db->insert_id; 
	 }
	 public static function view(){
		 global $db,$ext_new;
		 
		 echo "<table class='table table-border table-striped' >";
			
			echo "<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>User</th>
					<th>Date</th>
				</tr>";
				$result = $db->query("select pty.id, pty.name, pty.description, pty.user_id, pty.date from {$ext_new}product_type pty,{$ext_new}user u where u.id=pty.user_id");
				
				//$result = $db->query("select f.id, f.name, f.description, f.user_id from mfg_product_type f ,mfg_user u where u.id='1'");
				//list($_id, $_name, $_desc, $_user)= $result->fetch_row();
				//echo "$_id, $_name, $_desc, $_user";
			
			
		
				while(list($_id, $_name, $_desc, $_user, $_date)= $result->fetch_row()){
					$date_format = date("d-m-Y",strtotime($_date));
					echo "<tr>
							<th>$_id</th>
							<th>$_name</th>
							<th>$_desc</th>
							<th>$_user</th>
							<th>$date_format</th>
						</tr>";
				}
				
		 echo "</table>";
	 }
	
	
	 
}

?>
