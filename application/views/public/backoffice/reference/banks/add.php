<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Create Bank</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal"  data-toggle="validator"  method="POST" action="<?php echo base_url($this->layout.'submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Bank Name</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="bank_name" name="bank_name"  type="text" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
            <select id="country_id" name="country_id"  class="form-control select2" style="width: 100%;" requried>
            </select>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
    </div><!-- /.box-footer -->
  </form>
</div>