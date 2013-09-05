<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$user_id = $_GET["user_id"];
	$case_id = $_GET["case_id"];
	$now = $_GET["now"];
	if (strpos($now, "Accept Volunteer") !== false) {
		mysql_query("UPDATE Cases SET accepted_id = ".$user_id." WHERE case_id =".$case_id) or die(mysql_error());
		echo "Updated";

		$to = "mostafaasf@ymail.com";
		$subject = "Hello";
		$message = "masa2 el 3asal";
		$hey = mail($to,$subject,$message,"","");

	} elseif (strpos($now, "Accepted") !== false) {
		echo "Already Accepted";
	}
?>