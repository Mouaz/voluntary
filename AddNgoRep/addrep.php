<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	//$admin_id = $_SESSION['admin_id'];
	/////////////  FOR TESTING ONLY  \\\\\\\\\\\\\\\\\\\
	$admin_id = 1;
	
	$result = mysql_query("SELECT ngo_id FROM ngo_admin WHERE ngo_admin_id = ".$admin_id );
	$ngo_id = mysql_fetch_array($result);


	mysql_query("INSERT INTO ngo_rep (user_name, password, email, ngo_id) 
				 VALUES ('".$username."', '".$password."', '".$email."', ".$ngo_id["ngo_id"]." )");
	echo "success";
?>