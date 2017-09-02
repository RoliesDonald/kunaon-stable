<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box">
            <div class="box-body box-profile">
                <div class="" id="crop-avatar">

                    <!-- Current avatar -->
                    <div class="avatar-view" >
                        <img  class="profile-user-img img-responsive img-circle" src="<?php echo user_image(); ?>" alt="Avatar"  data-toggle="tooltip" data-placement="top" 
                              title="Ganti Foto Profil">
                        <h3 class="profile-username text-center"><?php echo $data->fullname?></h3>
                        <p class="text-muted text-center"><?php echo user_role($data->id);?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Last Updated</b> <a class="pull-right"><?php echo my_date($data->created);?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Date Expired</b> <a class="pull-right"><?php echo my_date($data->expired)?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right"><i class="fa fa-check"></i> Active</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Cropping modal -->
                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="avatar-form" action="<?php echo base_url()?>api/upload/profile" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="avatar-modal-label">Profile Picture</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="avatar-body">

                                            <!-- Upload image and data -->
                                            <div class="avatar-upload">
                                                <input type="hidden" class="avatar-src" name="avatar_src">
                                                <input type="hidden" class="avatar-data" name="avatar_data">
                                                <span class="btn btn-default btn-file">
                                                    <i class="fa fa-upload"></i>  Choose Image <input type="file" class="avatar-input" id="avatarInput" class="fileinput" name="avatar_file" accept="image/x-png,image/gif,image/jpeg">
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
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user"></i> Personal Info</a></li>
                <li class=""><a href="#tab2" data-toggle="tab"><i class="fa fa-key"></i> Account</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="tab1">
                    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>user/profile">
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>"/>  
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Identity Number</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" id="identity_number" name="identity_number" value="<?php echo $data->identity_number; ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" id="fullname" name="fullname" value="<?php echo $data->fullname; ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <?php if ($data->gender == '1'): ?>
                                        <label>
                                            <input type="radio" value="1" name="gender" class="flat-red" checked> Male
                                        </label>
                                        <label>
                                            <input type="radio" value="0" name="gender" class="flat-red"> Female
                                        </label>
                                        <?php EndIf; ?>  
                                    <?php if ($data->gender == '0'): ?>
                                        <label>
                                            <input type="radio" value="1" name="gender" class="flat-red"> Male
                                        </label>
                                        <label>
                                            <input type="radio" value="0" name="gender" class="flat-red" checked> Female
                                        </label>
                                        <?php EndIf; ?>  
                                    <?php if ($data->gender == null): ?>
                                        <label>
                                            <input type="radio" value="1" name="gender" class="flat-red"> Male
                                        </label>
                                        <label>
                                            <input type="radio" value="0" name="gender" class="flat-red"> Female
                                        </label>
                                        <?php EndIf; ?>   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="<?php echo $data->phone; ?>" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Merriage Status</label>
                            <div class="col-sm-4">
                                <select name="status_merriage" id="status_merriage" class="form-control select2">
                                    <?php echo option_setting('op_status', $data->status_merriage); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Religious</label>
                            <div class="col-sm-4">
                                <select name="religious" id="religious" class="form-control select2">
                                    <?php echo option_setting('op_religious', $data->religious); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Blood Type</label>
                            <div class="col-sm-4">
                                <select name="blood_type" id="blood_type" class="form-control select2">
                                    <?php echo option_setting('op_blood_type', $data->blood_type); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" id="address" required="true" rows="4" class="form-control input-sm"><?php echo $data->address; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" value="profile" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
                <div class=" tab-pane" id="tab2">
                    <form class="form-horizontal" data-toggle="validator" role="form" method="POST" action="<?php echo base_url(); ?>backoffice/setting/user/profile">
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>"/>  
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input class="form-control input-sm" id="email" name="email" value="<?php echo $data->email; ?>" type="email" data-error="Format email salah !!"  required/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input class="form-control input-sm" data-minlength="6" id="password" name="password"  type="password" required/>
                                <div class="help-block">Please input 6 character or least</div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Retype Password</label>
                            <div class="col-sm-9">
                                <input class="form-control input-sm" data-match="#password" data-match-error="Sorry, invalid password !!" data-error="Please type again you password !!" id="repassword" name="repassword"  type="password" required/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" value="account" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->
