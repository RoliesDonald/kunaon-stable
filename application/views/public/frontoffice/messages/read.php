<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $data->subject;?></h3>
                <h5>From:  <?php echo $data->fullname;?><span class="mailbox-read-time pull-right"><?php echo $data->created;?></span></h5>
              </div><!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <a href="<?php echo base_url('messages/reply/'.$data->id_message);?>" data-toggle="tooltip" title="Reply" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></a>
                  <a href="<?php echo base_url('messages/forward/'.$data->id_message);?>" data-toggle="tooltip" title="Forward" class="btn btn-default btn-sm"><i class="fa fa-share"></i></a>
                  <a href="<?php echo base_url('messages/delete/'.$data->id_message);?>" data-toggle="tooltip" title="Delete" class="btn btn-default btn-sm delete"><i class="fa fa-trash-o"></i></a>
                </div><!-- /.btn-group -->
              </div><!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                 <?php echo $data->content; ?>
              </div><!-- /.mailbox-read-message -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <a href="<?php echo base_url('messages/reply/'.$data->id_message);?>" data-toggle="tooltip" title="Reply" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Reply</a>
                  <a href="<?php echo base_url('messages/forward/'.$data->id_message);?>" data-toggle="tooltip" title="Forward" class="btn btn-default btn-sm"><i class="fa fa-share"> Forward</i></a>
              </div>
              <a href="<?php echo base_url('messages/delete/'.$data->id_message);?>" data-toggle="tooltip" title="Delete" class="btn btn-default btn-sm delete"><i class="fa fa-trash-o"> Delete</i></a>
            </div><!-- /.box-footer -->
        </div>
    </div>
</div>