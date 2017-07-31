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
	$contents .= "?>";	

	$mysql_host = $_POST['dbHost'];
	$mysql_username = $_POST['dbUserName'];
	$mysql_password = $_POST['dbPass'];
	$mysql_database = $_POST['dbName'];

	
	if(file_exists('../config.php')){
		unlink('../config.php');
		file_put_contents($file, $contents);
	}else{
		file_put_contents($file, $contents);
	}

	// Redirect Dump Main SQL
	$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	$sql= file_get_contents('install.sql');
	$result = mysqli_multi_query($conn,$sql);
	if($result){
		// Redirect To Main Directory
		$install_dir = "http://".$_SERVER['HTTP_HOST'];
		$install_dir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		header("Location: ".$install_dir.'');

	}else{
		die('Error Install to MySQL server: ' . mysqli_error());
	}

	$conn->close();

	

}



?>