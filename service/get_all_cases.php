<?php
include 'models/cases.php';

$cases_array = array();
			$cases_array = get_all_cases();
		//foreach($tasks_array as $value){
			//	echo '<li><a href="editask.php?task='.$value['task_id'].'"><h2>'.$value['title'].'</h2> <p><strong>'.$value['description'].'</strong></p>'.'<p class="ui-li-aside">'.$value['day_time'].'</p></a></li>';
		//}
		echo '{"items":'. json_encode($cases_array) .'}';

?>