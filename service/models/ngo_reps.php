<?php

include '../service/actions/general.php';
include '../service/init.php';

function ngo_rep_login($user_name,$password){
$ngo_rep_id = ngo_rep_id_from_user_name($user_name);
$user_name = sanitize($user_name);
//$password = md5($password);
$query = mysql_query("SELECT COUNT(`ngo_rep_id`) FROM  `ngo_rep` WHERE  `user_name` =  '$user_name' AND `password` = '$password'");

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Europe/Istanbul'));
if(mysql_result($query,0)==1){
add_log("\n [".$date->format('Y-m-d H:i:s')."] $email logged in successfully \n");
}
return (mysql_result($query,0)==1) ? $ngo_rep_id : false;
}

function ngo_rep_logged_in(){
return (isset($_SESSION['ngo_rep_id']))? true : false;
}
function ngo_rep_name_exists($name){
$name = sanitize($name);
$query = mysql_query("SELECT COUNT('ngo_rep_id') FROM  `ngo_rep` WHERE  `user_name` =  '$name'");
return (mysql_result($query, 0)==1) ? true : false;
}

function ngo_rep_id_from_user_name($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT `ngo_rep_id` FROM  `ngo_rep` WHERE  `user_name` =  '$email'");
	//echo (mysql_result($query,0));
	return (mysql_result($query,0));
}
?>