<header class="main-header">
    <!-- Logo -->
   <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>PS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
         <img id="" class="img-responsive pull-left" src="<?php echo base_url();?>assets/dist/img/logo.png" />
         <div class="pull-left">&nbsp<b>KuNaon</b> POS</div>
      </span>
    </a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php $message = get_messages(); ?>
                <?php if(count($message)>0): ?>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                      <span class="label label-success"><?php echo count($message); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have <?php echo count($message); ?> messages</li>
                      <li>
                        <ul class="menu">
                          <?php foreach($message as $ms): ?>  
                            <li>
                              <a href="<?php echo base_url('backoffice/messages/read/'.$ms->id_message);?>">
                              <div class="pull-left">
                                <img src="<?php echo user_image($ms->from_by);?>" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                <?php echo $ms->fullname; ?>
                                <small><i class="fa fa-clock-o"></i> <?php echo my_date($ms->created);?></small>
                              </h4>
                              <p><?php echo $ms->subject; ?></p>
                            </a>
                            </li>
                          <?php EndForeach; ?> 
                        </ul>
                      </li>
                      <li class="footer"><a href="<?php echo base_url('backoffice/messages');?>">See All Messages</a></li>
                    </ul>
                 </li>
                 <?php EndIf; ?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo user_image();?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo account_name();?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo user_image();?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo account_name();?>
                                <small> <?php echo $this->session->userdata('ROLES'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                         <?php if($this->session->userdata('ALLOW_FRONTOFFICE')==true): ?>
                         <li class="user-body">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <a href="<?php echo base_url();?>"><i class="fa fa-line-chart"></i> Front Office</a>
                                </div>
                            </div>
                         </li>
                         <?php EndIf; ?>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url();?>backoffice/setting/user/profile" class="btn btn-default btn-flat">My Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url();?>account/logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
    </nav>
</header>