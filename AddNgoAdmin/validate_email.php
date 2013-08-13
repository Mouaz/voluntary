<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$problems = "";
	$email = $_GET["email"];

	$result_email = mysql_query("SELECT * FROM ngo_admin WHERE email = '".$email."' ");
	$emailcount = mysql_num_rows($result_email);
	if ($emailcount > 0) {
		$problems = $problems."taken_email ";
	} else {
		$problems = $problems."emailok ";
	}
	echo $problems;
?>