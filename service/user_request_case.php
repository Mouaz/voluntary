<?php

require 'init.php';
include 'models/cases.php';


if($_GET['case_id']>0){
case_request(13,$_GET['case_id']);
}
	
?>