<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$updates = $_POST['updates'];
	if (isset($_POST['updates'])) {
		$updates = 1;
	} else {
		$updates = 0;
	}
	$phone_number = $_POST['phone_number'];
	mysql_query("INSERT INTO user (user_name, password, email, updates, phone_number) 
				 VALUES ('".$username."', '".$password."', '".$email."', '".$updates."', '".$phone_number."' )") or die(mysql_error());
	echo "success";
?>