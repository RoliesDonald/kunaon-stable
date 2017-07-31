<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Detail Member
                </div>
                <div class="box-tools">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-detail table-hover table-bordered table-striped">
                    <tr>
                      <td>Member ID</td>
                      <td>MBR<?php echo date('y').''.index_number($data->id_main,5);?></td>
                    </tr>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td><?php echo $data->fullname;?></td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td>
                         <?php if($data->gender=='1'){ echo "Male"; }else{  echo "Female"; } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                       <td><?php echo $data->email;?></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td><?php echo $data->phone;?></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td><?php echo $data->address;?></td>
                    </tr>
                </table>    
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <a class="btn btn-default btn-sm" href="<?php echo base_url('member');?>"><i class="fa fa-reply"></i> Back</a>  
                <a class="btn btn-default btn-sm" href="<?php echo base_url('member/add');?>"><i class="fa fa-plus"></i> Add New</a>
                <a class="btn btn-default btn-sm" href="<?php echo base_url('member/edit/'.$data->id_main);?>"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-default btn-sm delete" href="<?php echo base_url('member/delete/'.$data->id_main);?>"><i class="fa fa-trash"></i> Delete</a>  
            </div>
        </div>
    </div>
</div>