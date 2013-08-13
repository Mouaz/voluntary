<?php

include '../service/actions/general.php';
include '../service/init.php';

function admin_login($user_name,$password){
$admin_id = admin_id_from_user_name($user_name);
$user_name = sanitize($user_name);
//$password = md5($password);
$query = mysql_query("SELECT COUNT(`admin_id`) FROM  `admin` WHERE  `user_name` =  '$user_name' AND `password` = '$password'");

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Europe/Istanbul'));
if(mysql_result($query,0)==1){
add_log("\n [".$date->format('Y-m-d H:i:s')."] $email logged in successfully \n");
}
return (mysql_result($query,0)==1) ? $admin_id : false;
}

function admin_logged_in(){
return (isset($_SESSION['admin_id']))? true : false;
}
function admin_name_exists($name){
$name = sanitize($name);
$query = mysql_query("SELECT COUNT('admin_id') FROM  `admin` WHERE  `user_name` =  '$name'");
return (mysql_result($query, 0)==1) ? true : false;
}

function admin_id_from_user_name($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT `admin_id` FROM  `admin` WHERE  `user_name` =  '$email'");
	//echo (mysql_result($query,0));
	return (mysql_result($query,0));
}

?>