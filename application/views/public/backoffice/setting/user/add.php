<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Create User</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url($this->layout.'submit');?>">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input class="form-control input-sm" id="email" name="email"  type="email" required>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Role</label>
        <div class="col-sm-10">
           <select class="form-control input-sm select2" id="roles" name="roles[]" multiple="true" required>
               <?php echo get_option($roles,'role_name'); ?>
           </select>
        </div>
      </div>
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Application Menu</label>
        <div class="col-sm-10">
            <div class="menu-tree slimScroll">
               <ul>
                 <li><input type='checkbox' id="all" class='flat-red' /> Select All <ul id="menu-all"><?php sidebar_menu(true); ?></ul></li>
               </ul>
            </div>
        </div>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a class="btn btn-default btn-sm" href="<?php echo base_url($this->layout.'index');?>"><i class="fa fa-reply"></i> Back</a>
      <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
    </div><!-- /.box-footer -->
  </form>
</div>