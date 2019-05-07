<?php
include("lib/class/class-role.php");

if(isset($_POST["btnSubmit"])){
		$rname=trim($_POST["txtrName"]);
		$desc=trim($_POST["txtRdesc"]);
		
		$user_id=$_SESSION["s_id"];
		
		$rol = new Role($rname,$desc,$user_id);
		$valid = $rol->valid();
		if($valid == "true"){
			$rol->save();
			$rolresult = "Role Successfully Save";
		}else{
			$rolresult = $valid;
		}
		
}
?>
<h3 class='text-center'>Add Role</h3>
<div class="text-center"><h4><?php echo isset($rolresult)?$rolresult:""; ?></h4></div>
<form class="form-horizontal" action="#" method="post">
	
	<div class="form-group">
    <label  for="rln" class="col-sm-12 control-label">Role Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="rln" placeholder="Designation Name" name="txtrName" required>
    </div>
  </div>
  <div class="form-group">
    <label for="rldes" class="col-sm-12 control-label">Description *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="rldes" placeholder="Description" name="txtRdesc" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
    </div>
  </div>


</form>