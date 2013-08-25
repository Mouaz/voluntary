<?php

include '../service/actions/general.php';
include '../service/init.php';

function post_to_facebook($link, $message){
require_once '../service/fb-src/facebook.php';
$link = sanitize($link);
$message = sanitize($message);
$facebook = new Facebook(array(
  'appId'  => '149481341919753',
  'secret' => '74620fc5100b64fc7864d4dc08bf2605',
));

$user = $facebook->getUser();
if($user){
try {
//$facebook = new Facebook('149481341919753', '74620fc5100b64fc7864d4dc08bf2605');
print_r($_SESSION['fb_149481341919753_access_token']);
$facebook->api_client->session_key = $_SESSION['fb_149481341919753_access_token'];
/*$fetch = array('friends' =>
array('pattern' => '.*',
'query' => 'select uid2 from friend where uid1={$user}'));*/
$ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'link' => $link,
                                      'message' => $message
                                 ));

} catch(Exception $e) {
echo $e . '<br />';
}
}else{
echo 'ana feen?';
}

}
function user_id_from_email($email){
	$email = sanitize($email);
	//echo "SELECT `user_id` FROM  `user` WHERE  `email` =  '$email'";
	$query = mysql_query("SELECT `user_id` FROM  `user` WHERE  `email` =  '$email'")or die(mysql_error());
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