<?php

require 'init.php';
include 'models/cases.php';


if($_GET['case_id']>0){
if($_GET['status']==0){
case_request($session_user_id,$_GET['case_id']);
}else{
case_cancel_request($session_user_id,$_GET['case_id']);
}
}
	
?>