
<form class="form-horizontal"  action="#" method="post" enctype="multipart/form-data">
	<input type="hidden" name="pid" value="<?php echo $pid ?>" />
	 <div class="form-group">
		<label  class="col-sm-2 control-label">Type</label>
		 <div class="col-sm-10">
		   <select name="cmbType"  class="form-control">
			  <?php
				$pt = $db->query("select id,name from {$ext_new}product_type where id='$ptid' ");
				list($_id,$_name)=$pt->fetch_row();
				echo "<option value='$_id'>$_name</option>";
				$type_table=$db->query("select id,name from {$ext_new}product_type");
				while(list($id,$name)=$type_table->fetch_row()){
					if($_id !==$id ){
						echo "<option value='$id'>$name</option>";
					}				   
				}
			 
			 ?>
		   </select>
		 </div>
		</div>
	 <div class="form-group">
	 <label  class="col-sm-2 control-label">Product Name *</label>
		<div class="col-sm-10">
			<input type="text"  class="form-control" name="txtProductName" value="<?php echo $pname ?>"  />
		 </div>
	 </div>
	 <div class="form-group" >
		<label  class="col-sm-2 control-label">Unit Of Measurement</label>
		<div class="col-sm-10">
	   <select name="cmbUoM"  class="form-control">
		  <?php
			$umid = $db->query("select id,name from {$ext_new}uom where id='$umid' ");
			list($_id,$_name)=$umid->fetch_row();
			echo "<option value='$_id'>$_name</option>";
		   $uom_table=$db->query("select id,name from {$ext_new}uom");
		   while(list($id,$name)=$uom_table->fetch_row()){
				if($_id !==$id ){
					echo "<option value='$id'>$name</option>";
				}
			}
		 
		 ?>
	   </select>
	   </div>
	 </div>
    <div class="form-group">
	<label  class="col-sm-2 control-label">Manufacturer</label>
		<div class="col-sm-10">
		 <input type="text" class="form-control" name="txtMfg" value="<?php echo $manufacturer ?>" />
		</div>
	</div>	
 
 <div class="form-group">
	<label  class="col-sm-2 control-label">Description</label>
		<div class="col-sm-10">
			<textarea name="txtDesc" class="form-control" > <?php echo $description ?></textarea>
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
 <input type="submit" name="btnSubmit" value="Submit" />
 </div>
 
</form>