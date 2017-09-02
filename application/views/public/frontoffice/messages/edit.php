<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Compose Messages</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal"  data-toggle="validator"  method="POST" action="<?php echo base_url($this->layout.'send');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">To</label>
        <div class="col-sm-10">
          <select id="target_by" name="target_by[]" class="form-control select2" style="width: 100%;" multiple="true" required>
              <option value="<?php echo $data->target_by;?>" selected><?php echo $data->fullname;?></option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
        <div class="col-sm-10">
            <input class="form-control input-sm" id="subject" name="subject"  value="<?php echo $data->subject;?>" type="text" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control" rows="6" id="content" required="true" ><?php echo $data->content;?></textarea>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>  
       <div class="pull-right">
          <button type="submit" name="is_draft" value="1" class="btn btn-sm btn-warning"><i class="fa fa fa-file-text"></i> Draft</button>
          <button type="submit" name="is_draft" value="0" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Send</button>
       </div>
    </div><!-- /.box-footer -->
  </form>
</div>