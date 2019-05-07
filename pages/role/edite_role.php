
<h3 class='text-center'>Update Role</h3>
<form  action="#" method="post">
	<input type="hidden" name="role_id" value="<?php echo isset($txtId)?$txtId:""?>">
	<div class="form-group">
    <label  for="rln" class="col-sm-12 control-label">Role Name *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control"  id="rln"  name="txtrName" value="<?php echo isset($rolename)?$rolename:""?>">
    </div>
  </div>
  <div class="form-group">
    <label for="rldes" class="col-sm-12 control-label">Description *</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="rldes"  name="txtRdesc" value="<?php echo isset($descrip)?$descrip:""?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Update" name="btnupdate">
    </div>
  </div>


</form>