<?php

 if (isset($_POST["btnupdate"])){
	 $uid=$_POST["uid"];
	 $role_id=$_POST["cmbRoleId"];
	 $username=trim($_POST["txtUsername"]);
	 $password=trim($_POST["pwdPassword"]);
	 $repassword=trim($_POST["pwdRePassword"]);
	
	 if( $password == $repassword){	 
		  $result = new User($username,$password,$role_id);
		  $update  = $result->update($uid);
		  if($update){
				echo "User Updated successfully"; 
		  }
	  
	 }else{
		 echo "Password did not match";
		 
	}	 
 }
 
 if(isset($_POST['btnEdit'])){
	 $txtId = $_POST['txtId'];
	 $rolename = $_POST['rolename'];
	 $role_id = $_POST['role_id'];
	 $username = $_POST['txtuser'];
	 $password = $_POST['txtpass'];
 } 
 
 if(isset($_POST['btnDelete'])){
	 $uid = $_POST['txtId'];
	 User::delete($uid);
	 echo "Delete Successfully";
 } 
?>
<form class="form-horizontal" action="#" method="post">
  <div><?php echo isset($msg)?$msg:"";?></div>
	
	<input type="hidden" name="uid" value="<?php echo isset($txtId)?$txtId:""?>">
     <div class="form-group">
    <label  class="col-sm-2 control-label">Role</label>
    <div class="col-sm-10">
      <select name="cmbRoleId">
        <?php
			if(isset($role_id)){
				echo "<option value='$role_id'>$rolename</option>";
			}
           $result=$db->query("select id,name from {$ext_new}role");
		   while(list($id,$name)=$result->fetch_row()){
			 echo "<option value='$id'>$name</option>";   
			   
		   }
		?>
      </select>
    </div>
  </div>
  
   <div class="form-group">
    <label  class="col-sm-2 control-label">User Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtUsername" value="<?php echo isset($username)?$username:""?>" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pwdPassword" value="<?php echo isset($password)?$password:""?>" required>
    </div>
  </div>
  
   <div class="form-group">
    <label  class="col-sm-2 control-label">Retype Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pwdRePassword" value="<?php echo isset($password)?$password:""?>" required>
    </div>
  </div>
  
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="update" name="btnupdate">
    </div>
  </div>
</form>
<?php 


User::show_manage();


?>
