<?php

require 'init.php';
include 'models/cases.php';


if($_GET['case_id']>0){
if($_GET['status']==0){
case_request(14,$_GET['case_id']);
}else{
case_cancel_request(14,$_GET['case_id']);
}
}
	
?>