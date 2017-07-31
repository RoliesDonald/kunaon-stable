<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->app->GetTitle(); ?></title>
        <link rel=icon href="<?php echo base_url();?>assets/dist/img/logo.png" sizes="16x16" type="image/png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('templates/backoffice/_css'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-red-light sidebar-mini fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php $this->load->view('templates/backoffice/header'); ?>
            <?php $this->load->view('templates/backoffice/sidebar'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       <?php echo ucwords($this->router->fetch_class());?>
                    </h1>
                    <?php echo $this->app->generateBreadcrumb(); ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo $this->app->GetLayout(); ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('templates/backoffice/footer'); ?>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('templates/backoffice/_js'); ?>
        <?php $this->load->view('templates/messages'); ?>
    </body>
</html>
