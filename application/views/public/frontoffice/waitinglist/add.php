<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Waitinglist Baru</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url('waitinglist/submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Guest Name</label>
        <div class="col-sm-10">
           <input class="form-control input-sm" id="guest_name" name="guest_name" value="" type="text" required/>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control input-sm" id="email" name="email" value="" type="email" required/>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Phone NUmber</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="phone" id="phone" value="" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url('waitinglist');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
    </div><!-- /.box-footer -->
  </form>
</div>