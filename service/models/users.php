<?php

include 'actions/general.php';
include '../init.php';


function user_id_from_email($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT `user_id` FROM  `user` WHERE  `Email` =  '$email'");
	//echo (mysql_result($query,0));
	return (mysql_result($query,0));
}

function user_data($user_id){
$data = array();
$user_id = (int)$user_id;
$func_num_args = func_num_args();
$func_get_args = func_get_args();

$data = $func_get_args;

//echo $func_get_args[0];

if($func_num_args >1){
	 unset($func_get_args[0]);
	
	$fields = '`' . implode('`, `', $func_get_args) . '`';
	//echo $fields;
	//echo "SELECT $fields FROM `user` WHERE `user_id` = $user_id";
	
	$data = mysql_fetch_array(mysql_query("SELECT $fields FROM `user` WHERE `user_id` = $user_id"));
	
}
return $data;
}

function register_user($register_data){
	array_walk($register_data,  'array_sanitize');
	if(isset($register_data['password'])){
	$register_data['password'] = md5($register_data['password']);
	}
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'' ;
	
	$log_date = new DateTime();
$log_date->setTimezone(new DateTimeZone('Europe/Istanbul'));
add_log("\n [".$log_date->format('Y-m-d H:i:s').'] '.$register_data['name'].'('.$register_data['email'].' registered \n');

	
	mysql_query("INSERT INTO `user` ($fields) VALUES ($data)")or die(mysql_error());
}

?>