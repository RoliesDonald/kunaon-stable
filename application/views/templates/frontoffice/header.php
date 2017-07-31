<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
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
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $this->router->fetch_class()=='welcome' ? 'active':''; ?>"><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='messages' ? 'active':''; ?>"><a href="<?php echo base_url();?>messages"><i class="fa fa-envelope"></i> Messages</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='order' ? 'active':''; ?>"><a href="<?php echo base_url();?>order"><i class="fa fa-shopping-cart"></i>  Order</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='menus' ? 'active':''; ?>"><a href="<?php echo base_url();?>menus"><i class="fa fa-cutlery"></i>  Menu</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='waitinglist' ? 'active':''; ?>"><a href="<?php echo base_url();?>waitinglist"><i class="fa fa-clock-o"></i>  Waiting List</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='member' ? 'active':''; ?>"><a href="<?php echo base_url();?>member"><i class="fa fa-users"></i>  Members</a></li>
                    <li class="<?php echo $this->router->fetch_class()=='table' ? 'active':''; ?>"><a href="<?php echo base_url();?>table"><i class="fa fa-edit"></i>  Tables</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
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
                                  <a href="<?php echo base_url('messages/read/'.$ms->id_message);?>">
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
                          <li class="footer"><a href="<?php echo base_url('messages');?>">See All Messages</a></li>
                        </ul>
                     </li>
                     <?php EndIf; ?>
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo user_image();?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo account_name();?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo user_image();?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo account_name();?>
                                    <small><?php echo $this->session->userdata('ROLES');?></small>
                                </p>
                            </li>
                            <?php if($this->session->userdata('ALLOW_BACKOFFICE')==true): ?>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <a href="<?php echo base_url();?>backoffice/dashboard"><i class="fa fa-line-chart"></i> Back Office</a>
                                    </div>
                                </div>
                             </li>
                             <?php EndIf; ?>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url();?>user/profile" class="btn btn-default btn-flat"><i class="fa fa-user"></i> My Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url();?>account/logout" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>