<?php
include 'models/cases.php';

$notifications_array = array();
			$notifications_array = get_all_notifications($session_user_id);
		echo '{"items":'. json_encode($notifications_array) .'}';

?>