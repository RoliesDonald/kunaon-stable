<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Create new member</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url('member/submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-10">
           <input class="form-control input-sm" id="fullname" name="fullname" value="" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
            &nbsp&nbsp&nbsp
            <label>
                <input type="radio" value="1" name="gender" class="flat-red"> Male
            </label>
            &nbsp&nbsp&nbsp
            <label>
                <input type="radio" value="0" name="gender" class="flat-red"> Female
            </label>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control input-sm" id="email" name="email" value="" type="email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="phone" id="phone" value="" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
           <textarea name="address" id="address" required="true" rows="4" class="form-control input-sm"></textarea>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url('member');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
    </div><!-- /.box-footer -->
  </form>
</div>