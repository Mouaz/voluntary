<?php

require 'init.php';
include 'models/cases.php';


if(is_case_requested($session_user_id,$_GET['case_id'])){
 echo 1;
}else{
	echo 0;
}

?>