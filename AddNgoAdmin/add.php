<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$ngo_id = $_POST['ngo_id'];
	mysql_query("INSERT INTO ngo_admin (username, password, email, ngo_id) 
				 VALUES ('".$username."', '".$password."', '".$email."', '".$ngo_id."' )");
	echo "success";
?>