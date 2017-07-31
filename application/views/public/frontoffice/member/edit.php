<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Member</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url('member/submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-10">
           <input type="hidden" name="id" value="<?php echo $data->id_main;?>"/>
           <input class="form-control input-sm" id="fullname" name="fullname" value="<?php echo $data->fullname;?>" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
            <label>
                <input type="radio" value="1" name="gender" class="flat-red" <?php echo $data->gender == '1' ? "checked" : ""?> > Male
            </label>
            <label>
                <input type="radio" value="0" name="gender" class="flat-red" <?php echo $data->gender == '1' ? "checked" : ""?> > Female
            </label>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control input-sm" id="email" name="email" value="<?php echo $data->email;?>" type="email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="phone" id="phone" value="<?php echo $data->phone;?>" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
           <textarea name="address" id="address" required="true" rows="4" class="form-control input-sm"><?php echo $data->address;?></textarea>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url('member');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
    </div><!-- /.box-footer -->
  </form>
</div>