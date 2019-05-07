<?php
//include("lib/class/class-product_type.php");
	if(isset($_POST["btnSubmit"])){
	 
	 
	 $name=trim($_POST["txtPdtypeName"]);
	 $desc=trim($_POST["txtDescribe"]);
	 

	$user_id=$_SESSION["s_id"];
	
	$pty = new Pdtype($name, $desc, $user_id);
	$valid = $pty->valid();
	if($valid =="true"){
		$pty->save();
		$presult = "Product Type Success Fully Add";
	}else{
		$presult = $valid;
	}


}
?>
<h3 class='text-center'>Product Add</h3>
<div class="text-center"><h4><?php echo isset($presult)?$presult:"";?></h4></div>

<form class="form-horizontal" action="#" method="post">	
	  <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Product type *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="cn" placeholder="Contact Name" name="txtPdtypeName" required>
    </div>
  </div>
	
	<div class="form-group">
    <label  for="add" class="col-sm-12 control-label">Description</label>
    <div class="col-sm-12">
      <textarea type="text" id="add" class="form-control"  placeholder="Describe Unit Of Measurement" name="txtDescribe"></textarea>
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
    </div>
  </div>
	
</form>
