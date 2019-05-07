<?php 
// manage form
?>
<h3 class='text-center'>Manage Contact</h3>
<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
	<fieldset disabled>
	<input type="hidden" name="cid" value="<?php echo isset($txthId)?$txthId:""?>">
	
	<div class="form-group">
    <label  class="col-sm-2 control-label">Contact Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Contact Name" name="txtName" value="<?php echo isset($hname)?$hname:""?>" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Phone *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Phone" value="<?php echo isset($hphone)?$hphone:""?>" name="txtPhone" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="txtEmail" value="<?php echo isset($hemail)?$hemail:""?>"  placeholder="Email">
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label  class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control"  placeholder="Address" name="txtAddress"><?php echo isset($haddress)?$haddress:""?></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Update" name="btnupdate">
    </div>
  </div>
  </fieldset>
</form>