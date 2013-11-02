<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$user_id = $_GET["user_id"];
	$case_id = $_GET["case_id"];
	$now = $_GET["now"];
	if (strpos($now, "Accept Volunteer") !== false) {
		mysql_query("UPDATE cases SET accepted_id = ".$user_id." WHERE case_id =".$case_id) or die(mysql_error());

		$result = mysql_query("SELECT title FROM cases WHERE case_id = ".$case_id) or die(mysql_error());
		$row = mysql_fetch_row($result);
		$case_title = $row[0];


		mysql_query("INSERT INTO notification (user_id, ntf_text, time)
						VALUES (".$user_id.",'You have been accepted in the case: ".$case_title."',now())") or die(mysql_error());

		$vol_result = mysql_query("SELECT user_id FROM user_case WHERE case_id = ".$case_id) or die(mysql_error());
		while ($volunteers = mysql_fetch_array($vol_result)){
			if ($volunteers['user_id'] != $user_id) {
				mysql_query("INSERT INTO notification (user_id, ntf_text, time)
						VALUES (".$volunteers['user_id'].",'Sorry, you have been rejected in the case: ".$case_title."',now())") or die(mysql_error());
			}
			
		}

		echo "Updated";

	} elseif (strpos($now, "Accepted") !== false) {
		echo "Already Accepted";
	}
?>