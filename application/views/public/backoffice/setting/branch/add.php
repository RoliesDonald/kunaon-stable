<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Create Branch</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url($this->layout.'submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
             <select id="country_id" name="country_id"  class="form-control select2" style="width: 100%;" requried>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">VPN  Address</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="vpn" name="vpn"  type="text" required>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Token</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="token" name="token"  type="text" required>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Location Address</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
    </div><!-- /.box-footer -->
  </form>
</div>