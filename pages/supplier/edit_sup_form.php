
<?php


global $db,$ext_new; 

$sup = $db->query("select * from {$ext_new}supplier where id='$txtId' ");

list($id, $name, $Address, $phone, $description, $user_id, $date)=$sup->fetch_row();
?>

<h3 class='text-center'>Update Supplier</h3>
  

<form class="form-horizontal" action="#" method="post">	
	<input type="hidden" name="sup_id" value="<?php echo $id ?>">
    <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Supplier Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="cn" placeholder="Contact Name" name="txtName" value="<?php echo $name ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="phn" class="col-sm-12 control-label">Phone *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="phn" placeholder="Phone" name="txtPhone" value="<?php echo $phone ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="ema" class="col-sm-12 control-label">Description</label>
    <div class="col-sm-12">
     <textarea type="text" id="ema" class="form-control" name="txtDesc"><?php echo $description ?></textarea>
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label  for="add" class="col-sm-12 control-label">Address</label>
    <div class="col-sm-12">
      <textarea type="text" id="add" class="form-control" name="txtAddress"><?php echo $Address ?></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Update" name="btnupdate">
    </div>
  </div>

</form>