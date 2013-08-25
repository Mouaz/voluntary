<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$id = $_GET["id"];
	mysql_query("DELETE FROM Cases WHERE case_id = ".$id);
	echo "done";
?>