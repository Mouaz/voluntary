<?php
include '../service/actions/general.php';
include '../service/init.php';

function is_case_requested($user_id,$case_id){
	$query = mysql_query("SELECT COUNT('$case_id') FROM  `user_case` WHERE  `user_id` =  '$user_id' AND `case_id` =  '$case_id'");
	return (mysql_result($query, 0)==1) ? true : false;
}

function case_request($user_id,$case_id){
	mysql_query("INSERT INTO `user_case` (`user_id`,`case_id`) VALUES ('$user_id','$case_id')")or die(mysql_error());
	
$log_date = new DateTime();
$log_date->setTimezone(new DateTimeZone('Europe/Istanbul'));
add_log("\n [".$log_date->format('Y-m-d H:i:s').']  user with id '.$user_id.'requested case with id'.$case_id.'  \n');
	
}
function case_cancel_request($user_id,$case_id){
	mysql_query("DELETE FROM `user_case` WHERE `user_id` =  '$user_id' AND `case_id` =  '$case_id'");
	
$log_date = new DateTime();
$log_date->setTimezone(new DateTimeZone('Europe/Istanbul'));
add_log("\n [".$log_date->format('Y-m-d H:i:s').'] user no:'.$user_id.' canceled his request to '.$case_id.'\n');
}

function get_all_cases(){
$data = array();

	$result = mysql_query("SELECT * FROM `cases` ORDER BY `case_id` ASC ") or die(mysql_error());


$index = 0;
while($row = mysql_fetch_array($result))
{
     $data[$index] = $row;
     $index++;
}
	return $data;


}
function update_case($case_id,$update_data){

array_walk($update_data,'array_sanitize');

	
	$update = array();
	
	move_uploaded_file($_FILES["image"]["tmp_name"], "../Images Uploaded/" . $_FILES["image"]["name"]);
	$image = "Images Uploaded/".$_FILES["image"]["name"];
	
	foreach($update_data as $field=>$data){
		//if($field==='private'){
		//$update[]='`'.$field.'`'.'='.$data;
		//}else{
		$update[]='`'.$field.'`'.'=\''.$data.'\'';
		//}
	}
	//print_r($update);
//print("UPDATE `user` SET ".implode(', ',$update)."WHERE `user`.`user_id` = ".$_SESSION['user_id']);
	//echo ','.implode(', ',$update);


	mysql_query("UPDATE `cases` SET ".implode(', ',$update)." WHERE `cases`.`case_id` = '$case_id'")or die(mysql_error());

$log_case_data = get_case_data($case_id,'case_id','title','location');	
//print_r($log_task_data);
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Europe/Istanbul'));

add_log("\n [".$date->format('Y-m-d H:i:s')."] ".' updates a case to be '." with title : ".$log_case_data[1]." ,and its location : ".$log_case_data['location']."\n");

	//print_r($update);
	//$id = mysql_update_id();
	return $case_id;

}

function get_case_data($case_id){
$data = array();
$case_id = (int)$case_id;
$func_num_args = func_num_args();
$func_get_args = func_get_args();

$data = $func_get_args;

//echo $func_get_args[0];

if($func_num_args >1){
	 unset($func_get_args[0]);
	
	$fields = '`' . implode('`, `', $func_get_args) . '`';
	//echo $fields;
	//echo "SELECT $fields FROM `task` WHERE `task_id` = $task_id";
	
	$data = mysql_fetch_array(mysql_query("SELECT $fields FROM `cases` WHERE `case_id` = $case_id")) or die(mysql_error());
	
}
return $data;
}

?>