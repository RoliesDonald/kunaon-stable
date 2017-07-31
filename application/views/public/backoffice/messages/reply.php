<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Reply Messages</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <div class="box-body no-padding">
    <div class="mailbox-read-message">
       <?php echo $data->content; ?>
    </div><!-- /.mailbox-read-message -->
    <hr>
  </div>
  <form class="form-horizontal"  data-toggle="validator"  method="POST" action="<?php echo base_url($this->layout.'forward');?>">
    <div class="box-body">
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Form</label>
        <div class="col-sm-10">
            <label class="control-label">
               <strong><?php echo $data->fullname;?></strong>
               <input class="form-control input-sm"  name="target_by[]" type="hidden" value="<?php echo $data->from_by;?>" required>
            </label>
        </div>
      </div>
      <input class="form-control input-sm" id="id" name="id"  type="hidden" value="<?php echo $data->id_message;?>" required>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
        <div class="col-sm-10">
            <input class="form-control input-sm" id="subject" name="subject"  type="text" value="<?php echo $data->subject;?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Reply Messages</label>
        <div class="col-sm-10">
            <textarea name="content" class="ckeditor" id="content" required="true" ></textarea>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'read/'.$data->id_message);?>"><i class="fa fa-reply"></i> Back</a>  
       <div class="pull-right">
          <button type="submit" name="is_draft" value="0" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Send</button>
       </div>
    </div><!-- /.box-footer -->
  </form>
</div>