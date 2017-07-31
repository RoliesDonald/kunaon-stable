<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box">
            <div class="box-body box-profile">
                <div class="" id="crop-avatar">
                    <!-- Current avatar -->
                    <div class="avatar-view" >
                        <?php
                            $image = null;
                            if(file_exists(setting('com_logo'))){
                                $image = base_url().''.setting('com_logo');
                            }else{
                                $image = base_url().'assets/dist/img/No-Image-Available.jpg';
                            }
                        ?>
                        <img  class="profile-user-img img-responsive img-circle" src="<?php echo $image;?>" alt="Avatar"  data-toggle="tooltip" data-placement="top" 
                              title="Change Company Logo">
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item text-center">
                                <b><?php echo setting('com_name');?></b>
                            </li>
                            <li class="list-group-item text-center">
                                <b><?php echo setting('com_email');?></b> 
                            </li>
                            <li class="list-group-item text-center">
                                <b><?php echo setting('com_phone');?></b>
                            </li>
                        </ul>
                    </div>
                    <!-- Cropping modal -->
                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="avatar-form" action="<?php echo base_url()?>api/upload/company" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="avatar-modal-label">Company Logo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="avatar-body">

                                            <!-- Upload image and data -->
                                            <div class="avatar-upload">
                                                <input type="hidden" class="avatar-src" name="avatar_src">
                                                <input type="hidden" class="avatar-data" name="avatar_data">
                                                <span class="btn btn-default btn-file">
                                                    <i class="fa fa-upload"></i>  Choose Image <input type="file" class="avatar-input" id="avatarInput" class="fileinput" name="avatar_file">
                                                </span>
                                            </div>

                                            <!-- Crop and preview -->
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="avatar-wrapper"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="avatar-preview preview-lg"></div>
                                                    <div class="avatar-preview preview-md"></div>
                                                    <div class="avatar-preview preview-sm"></div>
                                                </div>
                                            </div>

                                            <div class="row avatar-btns">
                                                <div class="col-md-9">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                    <!-- Loading state -->
                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-9">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Company Info</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" data-toggle="validator" method="POST" action="<?php echo base_url($this->layout.'/submit');?>">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Cafe / Restaurant Name</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_name" name="com_name" value="<?php echo setting('com_name');?>"  type="text" required>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-9">
                   <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" id="com_phone" name="com_phone" value="<?php echo setting('com_phone');?>" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                    </div><!-- /.input group -->
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Website</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_website" name="com_website" value="<?php echo setting('com_website');?>"  type="text" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_email" name="com_email" value="<?php echo setting('com_email');?>"  type="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Fax</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_fax" name="com_fax" value="<?php echo setting('com_fax');?>" data-inputmask='"mask": "999-9999"' data-mask  type="text" required>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Service Tax</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_tax" name="com_tax" value="<?php echo setting('com_tax');?>" min="0" max="100" type="number" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Member Discount</label>
                <div class="col-sm-9">
                  <input class="form-control input-sm" id="com_discount" name="com_discount" value="<?php echo setting('com_discount');?>" min="0" max="100" type="number" required>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Opened</label>
                <div class="col-sm-9 ">
                  <div class="input-group clockpicker">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                      </span>
                      <input type="text" class="form-control" id="com_hours_first" name="com_hours_first" value="<?php echo setting('com_hours_first');?>" readonly>
                    </div>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Closed</label>
                <div class="col-sm-9 ">
                  <div class="input-group clockpicker">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                      </span>
                      <input type="text" class="form-control" id="com_hours_last" name="com_hours_last" value="<?php echo setting('com_hours_last');?>" readonly>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">
                   <textarea rows="5" class="form-control input-sm" name="com_address" id="com_address" required><?php echo setting('com_address');?></textarea>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
            </div><!-- /.box-footer -->
          </form>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
