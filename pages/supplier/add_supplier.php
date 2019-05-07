<?php
include("lib/class/class-supplier.php");

	if(isset($_POST["btnSubmit"])){
	 
	 
	 $name=trim($_POST["txtName"]);
	 $phone=trim($_POST["txtPhone"]);
	 $desc=trim($_POST["txtDesc"]);
	 $address=trim($_POST["txtAddress"]);
		
	$user_id=$_SESSION["s_id"];
	
	$sup = new Supplier($name,$phone,$desc,$address,$user_id);
	$valid = $sup->valid();
	if($valid =="true"){
		$sup->save();
		$supresult = "Supplier Success Fully Add";
	}else{
		$supresult = $valid;
	}

}
?>
<h3 class='text-center'>Supplier Add Contact</h3>
  <div class="text-center"><h4><?php echo isset($supresult)?$supresult:"";?></h4></div>

<form class="form-horizontal" action="#" method="post">	
	
    <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Supplier Name *</label>
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
    <label for="ema" class="col-sm-12 control-label">Description</label>
    <div class="col-sm-12">
     <textarea type="text" id="ema" class="form-control" name="txtDesc" placeholder="Description"></textarea>
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

</form>

<?php Supplier::view_supplier() ; ?>