<div class="row">
    <div class="col-lg-3">
      <div class="box ">
        <div class="box-body box-profile">
          <?php if(file_exists($data->photo)): ?>
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().''.$data->photo;?>" alt="User profile picture">
          <?php Else: ?>
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/dist/img/No-Image-Available.jpg';?>" alt="Menu Picture">
          <?php EndIf; ?>  
          <h3 class="profile-username text-center"><?php echo $data->menu_name;?></h3>
          <p class="text-muted text-center"><?php echo $data->category_name;?></p>
          <a href="<?php echo base_url($this->layout.'edit/'.$data->id_main);?>" class="btn btn-primary btn-block"><b>Edit Menu</b></a>
        </div><!-- /.box-body -->
      </div>
    </div>
    <div class="col-lg-9">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Detail Menu
                </div>
                <div class="box-tools">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-detail table-hover table-bordered table-striped">
                    <tr>
                      <td>Menu Name</td>
                      <td><?php echo $data->menu_name;?></td>
                    </tr>
                   <tr>
                      <td>Category</td>
                      <td><?php echo $data->category_name;?></td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td><?php echo price($data->price);?></td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td><p><?php echo $data->description;?></p></td>
                    </tr>
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