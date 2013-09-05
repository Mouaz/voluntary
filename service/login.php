<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$username = $_GET['username'];
	$password = $_GET['password'];
	//$result = mysql_query("INSERT INTO user (user_name, password) VALUES ('".$username."', '".$password."')");
	$result = mysql_query("SELECT * FROM user where user_name='".$username."' && password='".$password."' ");
	$count = mysql_num_rows($result);
	
	
	if($count > 0) {
		echo "found";
	} else {
		echo "wrong";
	}
?>