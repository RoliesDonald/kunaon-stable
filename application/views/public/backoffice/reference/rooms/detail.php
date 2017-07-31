<div class="row">
    <div class="col-lg-3">
      <div class="box ">
        <div class="box-body box-profile">
          <?php if(file_exists($data->photo)): ?>
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().''.$data->photo;?>" alt="Room Image">
          <?php Else: ?>
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/dist/img/No-Image-Available.jpg';?>" alt="Room Image">
          <?php EndIf; ?>  
          <h3 class="profile-username text-center"><?php echo $data->room_name;?></h3>
          <p class="text-muted text-center"></p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Total Table</b> <a class="pull-right"><?php echo table_status($data->id_main,'total');?></a>
            </li>
            <li class="list-group-item">
              <b>Reserved</b> <a class="pull-right"><?php echo table_status($data->id_main,'reserved');?></a>
            </li>
            <li class="list-group-item">
              <b>Empty</b> <a class="pull-right"><?php echo table_status($data->id_main,'empty');?></a>
            </li>
          </ul>
          <a href="<?php echo base_url($this->layout.'edit/'.$data->id_main);?>" class="btn btn-primary btn-block"><b>Edit Room</b></a>
        </div><!-- /.box-body -->
      </div>
    </div>
    <div class="col-lg-9">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Detail Room
                </div>
                <div class="box-tools">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-detail table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Number Of Table</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $i=1; foreach($table as $row): ?>
                       <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $row->code;?></td>
                          <td>
                          <?php if($row->is_empty=='1'): ?>
                            <span class="label label-primary">Empty</span>
                          <?php Else: ?>
                            <span class="label label-danger">Reserved</span>
                          <?php EndIf; ?>  
                          </td>
                       </tr>
                       <?php $i++; EndForeach;?> 
                    </tbody>
                </table>    
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>  
                <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'add');?>"><i class="fa fa-plus"></i> Add New</a>
                <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'edit/'.$data->id_main);?>"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-default btn-sm delete" href="<?php echo base_url($this->layout.'delete/'.$data->id_main);?>"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
    </div>
</div>