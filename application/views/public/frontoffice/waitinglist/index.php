<div class="box">
    <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo base_url();?>waitinglist/add" class="btn btn-primary btn-sm" data-toggle="tooltip" 
                data-placement="top" title="Create Data">
                <i class="fa fa-plus"></i> Create
            </a>
            <a href="javascript:document.getElementById('FormDelete').submit()" class="btn btn-danger btn-sm btn-delete-all" data-toggle="tooltip" 
                data-placement="top" title="Delete Data">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>
        <div class="box-tools">
            <a href="<?php echo base_url();?>waitinglist" class="btn btn-warning btn-sm pull-right" data-toggle="tooltip" 
                data-placement="top" title="Refresh">
                <i class="fa fa-refresh"></i> Refresh
            </a>
           <form method="POST" id="FormDelete" action="<?php echo base_url();?>waitinglist/delete">
               <input type="hidden" name="dataDeleted" id="dataDeleted" value="">
           </form>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-hover table-striped table-bordered" id="TableWaitingList">
           <thead>
               <tr>
                   <th><input type="checkbox" class="flat-red check-all"/></th>
                   <th>No</th>
                   <th>Date Created</th>
                   <th>Guest Name</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
           </tbody>
        </table>    
    </div><!-- /.box-body -->
</div>
