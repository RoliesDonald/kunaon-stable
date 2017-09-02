<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password</title>

    <link rel=icon href="<?php echo base_url();?>assets/dist/img/logo.png" sizes="16x16" type="image/png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/Login.css">
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>


    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

    <body>
       <div class="container">
            <div class="card card-container">
                <img id="img-front" class="img-responsive center-block" src="<?php echo base_url();?>assets/dist/img/logo.png" />
                <p id="profile-name" class="profile-name-card">
                    KuNaon POS
                </p>
                 <div class="profile-name-card">
                    <?php $error_message = $this->session->flashdata('login_failed');?>
                     <?php if ($error_message):?>
                        <div class="alert alert-danger  alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <small><?php echo $this->session->flashdata('login_failed'); ?></small>
                        </div>
                     <?php endif?>
                     <?php $successed = $this->session->flashdata('successed');?>
                     <?php if ($successed):?>
                        <div class="alert alert-success  alert-dismissable">
                            <i class="fa fa-check"></i>
                            <small>
                                Request has been sent. You password will reset by administrator, please wait confirmation.
                            </small>
                        </div>
                     <?php endif?>
                 </div>
                 <form class="form-signin" data-toggle="validator" role="form" method="POST" action="<?php echo base_url();?>account/forgot">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
                </form><!-- /form -->
                <a href="<?php echo base_url('account/login');?>" class="forgot-password">
                    Sign In Application
                </a>
            </div>
        </div>

    </body>
</html>