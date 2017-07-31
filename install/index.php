<?php include "install.php"; ?>
<!DOCTYPE html>
<html>
   <head>
      <title>KuNaon - Installation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/font-awesome.min.css" rel="stylesheet">
	  <link rel=icon href="logo.png" sizes="16x16" type="image/png">
	  <style type="text/css">
		

		body, html {
		    height: 100%;
		   background: url(bg.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		
		.mycontent{
			margin-top: 5%;
			margin-bottom: 5%;
		}
	  </style>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page 
         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="container">
		 <div class="row">
		 	<?php if(!file_exists('../config.php')): ?>
			<div class="col-md-4 mycontent">
				<div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title"><i class="fa fa-desktop"></i> System Requirement</h3>
				   </div>
				   <div class="panel-body">
				   	<?php if(function_exists('mysqli_connect')): ?>
					<div class="alert alert-success">
						<i class="fa fa-check"></i>  <b>MySQLi Extensions is Enable</b>
					</div>	
					<?php Else: ?>
					<div class="alert alert-danger">
						<i class="fa fa-warning"></i> <b>MySQLi Extensions is Disable</b>
					</div>	
					<?php endif; ?>	
					<?php if (version_compare(PHP_VERSION, '5.0.0', '>=')): ?>
					<div class="alert alert-success">
						<i class="fa fa-check"></i>  <b>PHP Version >= 5 </b>
					</div>	
					<?php Else: ?>
					<div class="alert alert-danger">
						<i class="fa fa-warning"></i>  <b>PHP Version < 5 </b>
					</div>
					<?php endif; ?>	
				    </div>
				</div>
			</div>
			<div class="col-md-8 mycontent">
				<form class="form-horizontal " role="form" data-toggle="validator" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h3 class="panel-title"><i class="fa fa-server"></i> MySQL Database Configuration</h3>
					   </div>
					   <div class="panel-body">
						 <div class="form-group">
							  <label for="dbName" class="col-sm-3 control-label">Database Name</label>
							 <div class="col-sm-9">
								 <input type="text" class="form-control" name="dbName" placeholder="Database created in MySQL"  required>
							  </div>
					     </div>
						  <div class="form-group">
							  <label for="dbUserName" class="col-sm-3 control-label">Database Username</label>
							  <div class="col-sm-9">
								 <input type="text" class="form-control" name="dbUserName"  placeholder="Default username is root" required>
							  </div>
					     </div>
						  <div class="form-group">
							  <label for="dbPass" class="col-sm-3 control-label">Database Password</label>
							  <div class="col-sm-9">
								 <input type="text" class="form-control" name="dbPass" placeholder="Skip if database allowed empty password">
							  </div>
					     </div>
						  <div class="form-group">
							  <label for="dbHost" class="col-sm-3 control-label">Database Host</label>
							  <div class="col-sm-9">
								 <input type="text" class="form-control" name="dbHost" placeholder="Default host is localhost or 127.0.0.1" required>
							  </div>
					     </div>
					      <div class="form-group">
							  <label for="firstname" class="col-sm-3 control-label"></label>
							  <div class="col-sm-9">
								<button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> <b>Install KuNaon</b></button>
							  </div>
					     </div>
					   </div>
					</div>
				</form>
			</div>	
			<?php Else: ?>
			<?php

			$root = "http://".$_SERVER['HTTP_HOST'];
			$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
			$arr_url = explode('/', $root);
			$link = array();
			foreach($arr_url as $row){
				if($row==trim(strtolower('install'))){
					break;
				}
				$link[] = $row;
			}
			$base_url = implode('/', $link);

			?>
			<div class="col-md-12 mycontent">
				<div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title"><i class="fa fa-check"></i> Installation Complete</h3>
				   </div>
				    <div class="panel-body">
						<di class="row">
							<div class="col-md-6">
								<div class="alert alert-info">
							    	<p>
							    		<h1>Installation Completed!</h1>
								        <p>The default email or username is <strong>myadmin@kunaon.com</strong> and password is <strong>myuser</strong>. So, <strong>Change these when you login!</strong></p>
							    	</p>
						    	</div>
							</div>
							<div class="col-md-6">
								<span>
									<img src="frontoffice.png" class="img-thumbnail">
								</span>
								<div class="text-center">
									<br>
									<a href="<?php echo $base_url;?>" class="btn btn-primary"><i class="fa fa-home"></i> Go To Home Page</a>
								</div>
							</div>
						</di>
					</div>
				</div>
			</div>
			<?php EndIf; ?>
		 </div>	
	  </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files 
            as needed -->
      <script src="js/bootstrap.min.js"></script>
	  <script src="js/validator.min.js"></script>
   </body>
</html>