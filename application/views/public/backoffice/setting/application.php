<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Setting Application</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url($this->layout.'/submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Time Zone</label>
        <div class="col-sm-10">
            <select id="app_timezone" name="app_timezone"  class="form-control select2" style="width: 100%;" requried>
               <option value="<?php echo setting('app_timezone');?>" selected="selected"><?php echo setting('app_timezone');?></option>
            </select>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Currency</label>
        <div class="col-sm-10">
           <select id="app_currency" name="app_currency"  class="form-control select2" style="width: 100%;" requried>
                <option value="<?php echo setting('app_currency');?>" selected="selected"><?php echo setting('app_currency');?></option>
            </select>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Bill Width</label>
        <div class="col-sm-10">
             <div class="row">
                <div class="col-md-6">
                    <input type="number" name="app_bill_width"  class="form-control" min="0" value="<?php echo setting('app_bill_width');?>" required/>
                </div>
                <div class="col-md-6">
                    <select class="form-control select2"  name="app_bill_size" required>
                        <option value="0" <?php echo setting('app_bill_size') == '0' ? 'selected' : '' ;?>>Inches</option>
                        <option value="1" <?php echo setting('app_bill_size') == '1' ? 'selected' : '' ;?>>Centimetes</option>
                        <option value="2" <?php echo setting('app_bill_size') == '2' ? 'selected' : '' ;?>>Milimeters</option>
                    </select>
                </div>
             </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Currency</label>
        <div class="col-sm-10">
           <select id="app_currency" name="app_currency"  class="form-control select2" style="width: 100%;" requried>
                <option value="<?php echo setting('app_currency');?>" selected="selected"><?php echo setting('app_currency');?></option>
            </select>
        </div>
      </div>
     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Barcode</label>
        <div class="col-sm-10">
           <select id="app_barcode" name="app_barcode"  class="form-control select2" style="width: 100%;" requried>
                <option selected disabled>Select Barcode Type</option>
                <option value="TYPE_UPC_E" <?php echo setting('app_barcode')=='TYPE_UPC_E' ? 'selected' : ''  ?>>UPC-E</option>
                <option value="TYPE_UPC_A" <?php echo setting('app_barcode')=='TYPE_UPC_A' ? 'selected' : ''  ?>>UPC-A</option>
                <option value="TYPE_EAN_13" <?php echo setting('app_barcode')=='TYPE_EAN_13' ? 'selected' : ''  ?>>EAN</option>
            </select>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">VPN Address</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="app_vpn" value="<?php echo setting('app_vpn');?>" name="app_vpn" type="text" required>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Default Password</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="app_userpass" name="app_userpass" value="<?php echo setting('app_userpass');?>"  type="text" required>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Token</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="app_token" value="<?php echo setting('app_token');?>" readonly required>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
    </div><!-- /.box-footer -->
  </form>
</div>