<?php
include("lib/class/class-uom.php");
	if(isset($_POST["btnSubmit"])){
	 
	 
	 $uomname=trim($_POST["txtUOMName"]);
	 $desc=trim($_POST["txtDescribe"]);
	
	 $user_id=$_SESSION["s_id"];
	 
	 $uom = new Uom($uomname, $desc, $user_id);
	 $valid = $uom->valid();
	 if($valid =="true"){
		$uom->save();
		$uomresult = "Unit of measurement SuccessFully Add";
	}else{
		$uomresult = $valid;
	}
}


?>
<h3 class='text-center'>UOM Added</h3>
 <div class="text-center"><h3><?php echo isset($uomresult)?$uomresult:"";?></h3></div>
<form class="form-horizontal" action="#" method="post">	
	
    <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Unit Of Measurement Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="cn" placeholder="Contact Name" name="txtUOMName" required>
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