<?php
 


 if (isset($_POST["btnSubmit"])){
	 
	 $role_id=trim($_POST["cmbRoleId"]);
	 $username=trim($_POST["txtUsername"]);
	 $password=trim($_POST["pwdPassword"]);
	 $repassword=trim($_POST["pwdRePassword"]);
	 
	 
	 
	
	 if( $password== $repassword){
	 
	 /* $db->query("insert into user(username,password,role_id)values('$username','$password','$role_id')");
	  echo "Successfull added!";
	  $username="";*/
	  
	  $result= new User($username,$password,$role_id);
	  $save= $result->save();
	  if($save){
		  echo "User save successfully";
	  }
	 
	 }else{
		 echo "Password did not match";
		 
	}
	 
	
	 
	 
	 
 }
 

	 
	
?>
<h3 class='text-center'>Add User</h3>
<form class="form-horizontal" action="#" method="post">
  <div><?php echo isset($msg)?$msg:"";?></div>
  <fieldset>
     <div class="form-group">
    <label  class="col-sm-2 control-label">Role *</label>
    <div class="col-sm-10">
      <select name="cmbRoleId">
        <?php
            $result=$db->query("select id,name from {$ext_new}role");
		   while(list($id,$name)=$result->fetch_row()){
			 echo "<option value='$id'>$name</option>";   
			   
		   }
		?>
      </select>
    </div>
  </div>
  
   <div class="form-group">
    <label  class="col-sm-2 control-label">User Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="User Name" name="txtUsername" value="<?php echo isset($username)?$username:""?>" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Password *</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="password" name="pwdPassword" required>
    </div>
  </div>
  
   <div class="form-group">
    <label  class="col-sm-2 control-label">Retype Password *</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="password" name="pwdRePassword" required>
    </div>
  </div>
  
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Add" name="btnSubmit">
    </div>
  </div>
  </fieldset>
</form>
