<?php
require 'init.php';
include 'models/cases.php';


			$case_details = get_case_data($current_case_id,'case_id','title','description','image','closed','location');
		echo '{"items":'. json_encode($case_details) .'}';

?>