<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->app->getTitle();?></title>
        <link rel=icon href="<?php echo base_url();?>assets/dist/img/logo.png" sizes="16x16" type="image/png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php  $this->load->view('templates/frontoffice/_css');?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-red-light layout-top-nav fixed">
        <div class="wrapper">
        <?php  $this->load->view('templates/frontoffice/header');?>
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                    <h1>
                       <?php echo ucwords($this->router->fetch_class());?>
                    </h1>
                    <?php echo $this->app->generateBreadcrumb(); ?>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                       <?php echo $this->app->getLayout();?>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
            <?php  $this->load->view('templates/frontoffice/footer');?>
        </div>
        <!-- ./wrapper -->
        <?php  $this->load->view('templates/frontoffice/_js');?>
        <?php $this->load->view('templates/messages'); ?>
    </body>
</html>
