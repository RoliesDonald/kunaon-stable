<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Role</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url($this->layout.'submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Role Name</label>
        <div class="col-sm-10">
          <input type="hidden" name="id" value="<?php echo $data->id_main;?>"/>
          <input class="form-control input-sm" id="role_name" name="role_name" value="<?php echo $data->role_name;?>"  type="text" required>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
    </div><!-- /.box-footer -->
  </form>
</div>