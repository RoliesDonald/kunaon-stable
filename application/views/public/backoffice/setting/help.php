<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Help & Support</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" data-toggle="validator"  method="POST" action="#">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control input-sm" required/>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
           <input type="text" name="phone" class="form-control input-sm" required/>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
        <div class="col-sm-10">
          <input type="text" name="subject" class="form-control input-sm" required/>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea name="content" class="description ckeditor" id="description" required="true" ></textarea>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Attachment</label>
        <div class="col-sm-10">
           <input type="file" name="file"  multiple="true"/>
        </div>
      </div> 
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
    </div><!-- /.box-footer -->
  </form>
</div>