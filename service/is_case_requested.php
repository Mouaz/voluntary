<?php

require 'init.php';
include 'models/cases.php';


if(is_case_requested(2,$_GET['case_id']){
 echo 1;
}else{
	echo 0;
}

?>