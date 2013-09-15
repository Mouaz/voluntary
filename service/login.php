<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$username = $_GET['username'];
	$password = $_GET['password'];
	
	//$result = mysql_query("INSERT INTO user (user_name, password) VALUES ('".$username."', '".$password."')");
	$result = mysql_query("SELECT * FROM user where user_name='".$username."' && password='".$password."' ");
	$count = mysql_num_rows($result);
	
	
	if($count > 0) {
		$row = mysql_fetch_array($result);
		$user_id = $row['user_id'];
		$_SESSION['user_id'] = $user_id;
		echo "found";
	} else {
		echo "wrong";
	}
?>