<?php
session_start();
error_reporting(0);

require 'db/login.php';
require 'db/connect.php';
/*
include_once("models/users.php");
//include_once("actions/general.php");
//require 'models/log-file.php';

$log = array();

$in_session = 0;
$session_user_id = $_SESSION['user_id'];
$user_data = user_data($_SESSION['user_id'],'name','email','password','gender','birth_date');

$errors = array();
*/
//if(!isset()){
$current_case_id = $_SESSION['case_id'];
$session_user_id = $_SESSION['user_id'];
//}
$session_rep_id = $_SESSION['rep_id'];
$session_ngo_admin_id = $_SESSION['ngo_admin_id'];
$session_admin_id = $_SESSION['admin_id'];


//check for authentication


?>