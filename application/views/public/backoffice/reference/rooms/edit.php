<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Room</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="" id="crop-avatar">
                            <!-- Current avatar -->
                            <div class="avatar-view" >
                                 <?php if(file_exists($data->photo)): ?>
                                    <img  class="img-responsive img-thumbnail" src="<?php echo base_url() . ''.$data->photo; ?>" alt="Avatar"  data-toggle="tooltip" data-placement="top" 
                                      title="Upload Room Image">
                                <?php Else: ?>
                                    <img  class="img-responsive img-thumbnail" src="<?php echo base_url() . 'assets/dist/img/No-Image-Available.jpg'; ?>" alt="Avatar"  data-toggle="tooltip" data-placement="top" 
                                      title="Upload Room Image">
                                <?php EndIf; ?>    
                            </div>
                            <!-- Cropping modal -->
                            <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form class="avatar-form" action="<?php echo base_url() ?>api/upload/cropped" enctype="multipart/form-data" method="post">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" id="avatar-modal-label">Image Room</h4>
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
                    </div>
                    <div class="col-md-9">
                        <form class="form-horizontal" id="FormSubmit"   method="POST" action="<?php echo base_url($this->layout . 'submit'); ?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Room Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo $data->id_main;?>"/>
                                    <input type="hidden" name="cropped" id="photo"/>
                                    <input type="hidden" name="cropped_original" id="photo_original"/>
                                    <input type="text" class="form-control" name="room_name" id="room_name" value="<?php echo $data->room_name;?>"  required>
                                </div>
                            </div>
                            <div id="list">
                                <?php $i=0; foreach($table as $row): ?>
                                <div class="form-group" id="table<?php echo $i;?>">
                                    <label for="inputEmail3" class="col-sm-2 control-label"><?php if($i<1){ echo "Number Of Table"; }?></label>
                                    <div class="col-sm-10">
                                        <?php if($row->is_empty=='0'): ?>
                                         <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Number Of Table..." name="table[]" value="<?php echo $row->code;?>" required>
                                            <?php if($i<1): ?>
                                                <a href="javascript:void(0);" id="add" class="btn btn-default input-group-addon" data-toggle="tooltip" 
                                                     data-placement="top" title="Add Table">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            <?php Else: ?>
                                                <a href="javascript:deleteRow(<?php echo $i;?>);" id="delete" class="btn btn-default input-group-addon">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            <?php EndIf; ?>    
                                        </div>
                                        <?php Else: ?>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Number Of Table..." name="table[]" value="<?php echo $row->code;?>"  required>
                                            <?php if($i<1): ?>
                                                <a href="javascript:void(0);" id="add" class="btn btn-default input-group-addon" data-toggle="tooltip" 
                                                     data-placement="top" title="Add Table">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            <?php Else: ?>
                                                <a href="javascript:void(0);"  class="btn btn-default input-group-addon">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            <?php EndIf; ?>    
                                        </div>
                                        <?php EndIf; ?>
                                    </div>
                                 </div>
                                <?php $i++; EndForeach; ?>    
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btn-sm pull-left" href="<?php echo base_url($this->layout . 'index'); ?>"><i class="fa fa-reply"></i> Back</a>
                <a class="btn btn-primary btn-sm pull-right" id="btn-save" href="javascript:document.getElementById('FormSubmit').submit()"><i class="fa fa-save"></i> Update</a>
            </div><!-- /.box-footer -->
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
