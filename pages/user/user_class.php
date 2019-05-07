<?php  


class User{
  private $name;
  private $password;
  private $role_id;
  

  function __construct($_name,$_password,$_role_id){
	  
	  $this->name=$_name;
	  $this->password=$_password;
	  $this->role_id=$_role_id;
	  
  }
  
  public function save(){	  
	  global $db,$ext_new;
	  $db->query("insert into {$ext_new}user(name,password,role_id)values('$this->name','$this->password','$this->role_id')");
	  return $db->insert_id;
  }
  
  public function update($_id){
	  global $db,$ext_new;
	  $result = $db->query("update {$ext_new}user set name='$this->name',password='$this->password',role_id='$this->role_id' where id='$_id'");
	  return $result;
		 
  }
  
  public static function delete($_id){
	  
	  global $db,$ext_new;
	  $db->query("delete from {$ext_new}user where id='$_id'");
	
  }
  
  public static function show_all($startAt=0, $perPage=10){	 
	 global $db,$ext_new;
	   $con_table=$db->query("select u.id,u.name,u.password,r.name,r.id from {$ext_new}user u,{$ext_new}role r where r.id=u.role_id LIMIT $startAt, $perPage ");
   
   echo "<table class='table table-border table-striped'>";
   echo "<tr><th>Id</th><th>Username</th><th>Password</th><th>Role</th><th>&nbsp;</th></tr>";
   
   while(list($id,$name,$password,$rolename,$_rid)=$con_table->fetch_row()){   
	    
	 echo "<tr><td>$id</td><td>$name</td><td>$password</td><td>$rolename</td></tr>";
   }
   echo "</table>";
	  
	  
	  
  }
  
  public static function show_manage($startAt=0, $perPage=10){	 
	 global $db,$ext_new;
	   $con_table=$db->query("select u.id,u.name,u.password,r.name,r.id from {$ext_new}user u,{$ext_new}role r where r.id=u.role_id LIMIT $startAt, $perPage ");
   
   echo "<table class='table'>";
   echo "<tr><th>Id</th><th>Username</th><th>Password</th><th>Role</th><th>&nbsp;</th></tr>";
   
   while(list($id,$name,$password,$rolename,$_rid)=$con_table->fetch_row()){   
	    
	 echo "<tr><td>$id</td><td>$name</td><td>$password</td><td>$rolename</td><td><form action='#' method='post' style='display:inline'>
	<input type='hidden' name='txtId' value='$id' />
	<input type='hidden' name='txtuser' value='$name' />
	<input type='hidden' name='txtpass' value='$password' />
	<input type='hidden' name='rolename' value='$rolename' />
	<input type='hidden' name='role_id' value='$_rid' />
	<input type='submit' name='btnEdit' class='material-icons text-primary' value='edit'>
	</form>
<form action='#' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txtId' value='$id' /><input type='submit' name='btnDelete' class='material-icons text-danger' value='delete'></form></td></tr>";  
   }
   
   echo "</table>";
	  
	  
	  
  }
  
  public static function show($_id){
	  
	  global $db,$ext_new;
	  $result=$db->query("select u.id,u.name,u.password,r.name from {$ext_new}user u,{$ext_new}role r where r.id=u.role_id where u.id='$_id'");
	  while(list($id,$name,$password,$role)=$result->fetch_row()){
		 
      $status=	$inactive==0?"Active":"Inactive";
      echo "Id: $id <br/> User Name: $username <br/> Password: $password <br/> Role: $role <br/> <br/>";
	   		  
	 }
	  
  }


}	
	