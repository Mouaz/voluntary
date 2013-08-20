<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthdate = $_POST['birthdate'];
	$updates = $_POST['updates'];
	$job_description = $_POST['job_description'];
	if (isset($_POST['updates'])) {
		$updates = 1;
	} else {
		$updates = 0;
	}
	$phone_number = $_POST['phone_number'];
	if ($_POST['gender'] == 'male') {
		$gender = 1;
	} else {
		$gender = 0;
	}
	mysql_query("INSERT INTO user (user_name, password, email, birth_date, updates, job_description, phone_number, gender) 
				 VALUES ('".$username."', '".$password."', '".$email."', '".$birthdate."', '".$updates."', '".$job_description."', '".$phone_number."','".$gender."' )") or die(mysql_error());
	echo "success";
?>