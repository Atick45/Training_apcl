<h3 class='text-center'>Update UOM</h3>
 
<form class="form-horizontal" action="#" method="post">	
	<input type="hidden" name="uom_id" value="<?php echo isset($txtId)?$txtId:""?>">
    <div class="form-group">
    <label  for="cn" class="col-sm-12 control-label">Unit Of Measurement Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="cn" placeholder="Contact Name" name="txtUOMName" value="<?php echo isset($uom_name)?$uom_name:""?>">
    </div>
  </div>

  

  <div class="form-group">
    <label  for="add" class="col-sm-12 control-label">Description</label>
    <div class="col-sm-12">
      <textarea type="text" id="add" class="form-control"  placeholder="Describe Unit Of Measurement" name="txtDescribe" value="<?php echo isset($descrip)?$descrip:""?>"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Update" name="btnupdate">
    </div>
  </div>

</form>