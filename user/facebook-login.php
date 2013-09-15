<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require '../service/fb-src/facebook.php';
require '../service/models/users.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '149481341919753',
  'secret' => '74620fc5100b64fc7864d4dc08bf2605',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me' , 'GET');
	$userlocation = $facebook->api('/me/events', 'GET');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope' =>'user_birthday , email, publish_actions, publish_stream'));
  
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        <a href="<?php echo $loginUrl; ?>">Login with Facebook <small>click if you are not redirected</small></a>
      </div>
    <?php endif ?>

    <?php if ($user){
	echo $user;
/*	 $fql = "SELECT 
            eid, name, pic, start_time, end_time, location, description 
        FROM 
            event 
        WHERE 
            eid IN ( SELECT eid FROM event_member WHERE uid = $user) 
        AND 
            start_time >= now()
        ORDER BY 
            start_time desc";

$param  =   array(
    'method'    => 'fql.query',
    'query'     => $fql,
    'callback'  => ''
);
	
$fqlResult = $facebook->api($param);
//print_r($fqlResult);	
	
	for ($i=0; $i<count($fqlResult); $i++){ 
	
		$task_data = array(
								'title' => $fqlResult[$i]['name'],
								'description' => $fqlResult[$i]['description'],
								'user_id' => user_id_from_email($user_profile['email']),
								'private' => 0,
								'time' => date("Y-m-d H:i:s" , strtotime($fqlResult[$i]['start_time'])),
								'date' => date("Y-m-d" , strtotime($fqlResult[$i]['start_time'])),
								'day_time' => date("H:i:s" , strtotime($fqlResult[$i]['start_time'])),
								'facebook_event_id' => $fqlResult[$i]['eid']
								);
								echo facebook_task_exists($fqlResult[$i]['eid'],user_id_from_email($user_profile['email']))." ";
						if(!facebook_task_exists($fqlResult[$i]['eid'],user_id_from_email($user_profile['email']))){
print_r($task_data);
							add_task($task_data);
						}
	}   
	$events = $facebook->api_client->events_get(null, null, null, null, null);
echo "<h3>Return array from Facebook</h3>";
print_r($events);


	
$userlocation = $facebook->api('/me/events');
print_r($userlocation);*/
	if(user_id_from_email($user_profile['email'])>0){
	$session_user_id = user_id_from_email($user_profile['email']);
	$user_data = user_data($session_user_id,'user_name','email','password','gender','birth_date');
	//print_r($user_data);
	//$login = login($user_data['email']
	$_SESSION['user_id'] = $session_user_id;
	//header('pofb.php');
	header('Location: http://localhost/voluntary/WWW/home.html');
						exit();
		}else{
		if($user_profile['gender']==='male')
		$sex = 1;
		else $sex =0;
		$register_data = array(
								'user_name' => $user_profile['name'],
								'email' => $user_profile['email'],
								'birth_date' => $user_profile['birthday'],
								'gender' => $sex);
								register_user($register_data);
								
								$session_user_id = user_id_from_email($user_profile['email']);
								$_SESSION['user_id'] = $session_user_id;
								$user_data = user_data($session_user_id,'name','email','password','gender','birth_date','bio');
								//print_r($user_data);
								header('Location: http://localhost/voluntary/WWW/home.html');
						exit();
							}
							
	?>

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php }else{ ?>
    <?php } ?>

  </body>
</html>
