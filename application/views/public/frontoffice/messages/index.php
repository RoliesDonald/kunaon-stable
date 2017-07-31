<div class="row">
    <?php include('_menu_messages.php'); ?>
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
            <a href="<?php echo base_url();?>/messages/add" class="btn btn-primary btn-sm" data-toggle="tooltip" 
                data-placement="top" title="Create Data">
                <i class="fa fa-plus"></i> Compose
            </a>
            <a href="javascript:document.getElementById('FormDelete').submit()" class="btn btn-danger btn-sm btn-delete-all" data-toggle="tooltip" 
                data-placement="top" title="Delete Data">
                <i class="fa fa-trash"></i> Move To Trash
            </a>
        </div>
        <div class="box-tools">
             <a href="<?php echo base_url();?>/messages" class="btn btn-warning btn-sm pull-right" data-toggle="tooltip" 
                data-placement="top" title="Refresh">
                <i class="fa fa-refresh"></i> Refresh
            </a>
           <form method="POST" id="FormDelete" action="<?php echo base_url();?>/messages/delete">
               <input type="hidden" name="dataDeleted" id="dataDeleted" value="">
               <input type="hidden" name="deleted" id="deleted" value="false">
           </form>
        </div>
            </div>
             <div class="box-body table-responsive">
         <div id="button-tools" class="col-md-12 no-padding"></div>
         <table class="table table-hover table-striped table-bordered" width="100%" cellspacing="0" id="TableMessages">
            <thead>
                <tr>
                    <th><input type="checkbox" class="flat-red check-all"/></th>
                    <th>Date Send</th>
                    <th>To</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>    
    </div><!-- /.box-body -->
    <div class="box-footer clearfix"></div>
        </div>
    </div>
</div>