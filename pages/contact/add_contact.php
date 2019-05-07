<?php
 if(isset($_POST["btnSubmit"])){
	 
	 
	 $name=trim($_POST["txtName"]);
	 $phone=trim($_POST["txtPhone"]);
	 $email=trim($_POST["txtEmail"]);
	 $address=trim($_POST["txtAddress"]);
	 
	 $user_id=$_SESSION["s_id"];
	 
	 $now=date("Y-m-d H:i:s");
	 
	 $cont = new Contact($name,$phone,$email,$address,$user_id);
	 $valid = $cont->valid();
	 if($valid == "true"){
		 $cont ->save();
		 $result = "Contact successfully saved";
	 }else{
		 $result = $valid;
	 }
	
	 
	 
	 //$msg="Successfull added!"; 
 }
 
?>
<h3 class='text-center'>Customer Contact</h3>
  <div class="text-center"><h4><?php echo isset($result)?$result:"";?></h4></div>

<form class="form-horizontal table table-bordered table-dark" action="#" method="post">	
	
    <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Contact Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="cn" placeholder="Contact Name" name="txtName" required>
    </div>
  </div>

  <div class="form-group">
    <label for="phn" class="col-sm-12 control-label">Phone *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="phn" placeholder="Phone" name="txtPhone" required>
    </div>
  </div>

  <div class="form-group">
    <label for="ema" class="col-sm-12 control-label">Email</label>
    <div class="col-sm-12">
      <input type="email" id="ema" class="form-control" name="txtEmail"  placeholder="Email">
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label  for="add" class="col-sm-12 control-label">Address</label>
    <div class="col-sm-12">
      <textarea type="text" id="add" class="form-control"  placeholder="Address" name="txtAddress"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
    </div>
  </div>
  </fieldset>
</form>