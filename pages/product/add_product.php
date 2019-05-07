<?php
require_once "lib/class/class-product.php";

if(isset($_POST["btnSubmit"])){
	
	 $pname=$_POST["txtProductName"];	
	 $product_type_id=$_POST["cmbType"];
	 $uom_id=$_POST["cmbUoM"];
	 $mfg=$_POST["txtMfg"];
	 $desc=$_POST["txtDesc"];
	 
	 $photo_tmp=$_FILES["file"]["tmp_name"];
	 $photo_name=$_FILES["file"]["name"];
	 $ext = pathinfo($photo_name, PATHINFO_EXTENSION);

	$photo_loc="img/"; 
	
	$Product = new Product($pname,$product_type_id, $uom_id, $mfg, $photo_name, $desc);
	
	$save = $Product->save();
	if($save){
		$result = "added success";
	}
	
	if(!empty($photo_name)){
		copy($photo_tmp,$photo_loc.$save.".$ext");
		$db->query("update {$ext_new}product set photo='$db->insert_id.$ext' where id'$db->insert_id'");
	} 
}
?>
<?php echo isset($result)?$result:"" ?>
<h3 class='text-center'>Add Product</h3>

<form class="form-horizontal"  action="#" method="post" enctype="multipart/form-data">
	  <fieldset>
	 <div class="form-group">
		<label  class="col-sm-2 control-label">Type</label>
		 <div class="col-sm-10">
		   <select name="cmbType"  class="form-control">
			  <?php
			   $type_table=$db->query("select id,name from {$ext_new}product_type");
			   while(list($id,$name)=$type_table->fetch_row()){
				   echo "<option value='$id'>$name</option>";
				}
			 
			 ?>
		   </select>
		 </div>
		</div>
	 <div class="form-group">
	 <label  class="col-sm-2 control-label">Product Name *</label>
		<div class="col-sm-10">
			<input type="text"  class="form-control" name="txtProductName"  />
		 </div>
	 </div>
	 <div class="form-group" >
		<label  class="col-sm-2 control-label">Unit Of Measurement</label>
		<div class="col-sm-10">
	   <select name="cmbUoM"  class="form-control">
		  <?php
		   $uom_table=$db->query("select id,name from {$ext_new}uom");
		   while(list($id,$name)=$uom_table->fetch_row()){
			   echo "<option value='$id'>$name</option>";
			}
		 
		 ?>
	   </select>
	   </div>
	 </div>
    <div class="form-group">
	<label  class="col-sm-2 control-label">Manufacturer</label>
		<div class="col-sm-10">
		 <input type="text" class="form-control" name="txtMfg" />
		</div>
	</div>	
 
 <div class="form-group">
	<label  class="col-sm-2 control-label">Description</label>
		<div class="col-sm-10">
			<textarea name="txtDesc" class="form-control" ></textarea>
		</div>
 </div>
 <div class="form-group">
	<label  class="col-sm-2 control-label">Photo</label>
		<div class="col-sm-10">
			<input  type="file" name="file" class="form-control" />
		</div>
 </div>
 <br/>
 <div>
 <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit" />
 </div>
 </fieldset>
</form>
