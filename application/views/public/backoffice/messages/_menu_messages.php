<div class="col-md-3">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Folders</h3>
      <div class="box-tools">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#" id="btn-inbox"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"><?php echo $status['inbox'];?></span></a></li>
        <li><a href="#" id="btn-sent"><i class="fa fa-envelope-o"></i> Sent <span class="label label-info pull-right"><?php echo $status['sent'];?></span></a></li>
        <li><a href="#" id="btn-draft"><i class="fa fa-file-text-o"></i> Drafts <span class="label label-warning pull-right"><?php echo $status['draft'];?></span> </a></li>
        <li><a href="#" id="btn-trash"><i class="fa fa-trash-o"></i> Trash <span class="label label-danger pull-right"><?php echo $status['trash'];?></span></a></li>
      </ul>
    </div><!-- /.box-body -->
  </div><!-- /. box -->
</div>  