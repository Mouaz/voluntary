<?php
if(!function_exists("protect_page")) {
function protect_page(){
if(logged_in()===true){
header('Location: index.php');
exit();
}
}
}
if(!function_exists("sanitize")) {
function array_sanitize($item){
$item = mysql_real_escape_string($item);
}
}

if(!function_exists("sanitize")) {
function sanitize($data){
return mysql_real_escape_string($data);
}
}


require '../service/db/login.php';
require '../service/db/connect.php';

if(!function_exists("add_log")) {
function add_log($event){
mysql_query("INSERT INTO `log_file` (`message`) VALUES ('$event')") or die(mysql_error());

}
}
/*
if($_GET['message']==1){
$file = 'log.dat';
$current = '';
$result = mysql_query("SELECT l.message FROM log_file l  ORDER BY l.time ASC") or die(mysql_error());

$index = 0;
while($row = mysql_fetch_array($result))
{
     $data[$index] = $row;
     $index++;
}
print_r($data);
foreach($data as $k=>$v){
$current = $current.$v['message'];

}
file_put_contents($file, $current);
}*/
?>