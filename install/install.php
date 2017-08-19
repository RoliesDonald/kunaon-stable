<?php

if (!empty($_POST)){

	$file = '../config.php';
    
	$contents = "<?php \n";
    $contents .= "//Database details \n";
    $contents .= "define ('DB_HOST', '".$_POST['dbHost']."'); \n";
    $contents .= "//Username \n";
    $contents .= "define ('DB_USERNAME', '".$_POST['dbUserName']."'); \n";
    $contents .= "//Pass \n";
    $contents .= "define ('DB_PASS', '".$_POST['dbPass']."'); \n";
    $contents .= "//Database Name \n";
	$contents .= "define ('DB_NAME', '".$_POST['dbName']."'); \n";
	$contents .= "//Root Directory \n";
	$contents .= "define ('ROOT_DIR', '".$_POST['dir']."'); \n";
	$contents .= "?>";	

	$mysql_host = $_POST['dbHost'];
	$mysql_username = $_POST['dbUserName'];
	$mysql_password = $_POST['dbPass'];
	$mysql_database = $_POST['dbName'];


	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

	/* check connection */
	if ($mysqli->connect_errno) {
	    $root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	    header("Location: ".$root.'?error='.$mysqli->connect_error);
	}else{

		// Redirect Dump Main SQL
		$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

		$sql= file_get_contents('install.sql');
		$tally=0;

		if(mysqli_multi_query($conn,$sql)){
		    do{
		        $tally+=mysqli_affected_rows($conn);
		    } while(mysqli_more_results($conn) && mysqli_next_result($conn));
		}

		if($error_mess=mysqli_error($conn)){
	   		 die('Error Install to MySQL server: ' . mysqli_error());
		}else{
			if(file_exists('../config.php')){
				unlink('../config.php');
				file_put_contents($file, $contents);
			}else{
				file_put_contents($file, $contents);
			}
		    header("Location: ".$_POST['dir'].'install');
		}

		$conn->close();

	}

}



?>