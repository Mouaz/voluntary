<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$problems = "";
	$username = $_GET["username"];
	
	$result_name = mysql_query("SELECT * FROM ngo_rep WHERE user_name = '".$username."' ") or die(mysql_error());
	$usercount = mysql_num_rows($result_name);
	if ($usercount > 0) {
		$problems = $problems."taken_username ";
	} else {
		$problems = $problems."usernameok ";
	}

	
	echo $problems;

?>