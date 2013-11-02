<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$id = $_GET["id"];

	$result = mysql_query("SELECT image FROM cases WHERE case_id = ".$id);
	$imageArray = mysql_fetch_array($result);
	$image = $imageArray["image"];
	unlink("../".$image);
	
	mysql_query("DELETE FROM cases WHERE case_id = ".$id);
	echo "done";
?>