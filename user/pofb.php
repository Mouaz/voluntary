<html>

<form id="recover-form"  method="post">

<h3>post on facebook</h3>
<input type="text" name="text" placeholder="post here..">
<br>
<input type="submit" value="recover" class="btn btn-invert">
</form>
</html>
<?php
require '../service/fb-src/facebook.php';
require '../service/models/users.php';

$facebook = new Facebook(array(
  'appId'  => '149481341919753',
  'secret' => '74620fc5100b64fc7864d4dc08bf2605',
));

$user = $facebook->getUser();
if($user){
try {
//$facebook = new Facebook('149481341919753', '74620fc5100b64fc7864d4dc08bf2605');
print_r($_SESSION['fb_149481341919753_access_token']);
$facebook->api_client->session_key = $_SESSION['fb_149481341919753_access_token'];
/*$fetch = array('friends' =>
array('pattern' => '.*',
'query' => 'select uid2 from friend where uid1={$user}'));*/
$ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'link' => 'www.nasheroon.com',
                                      'message' => 'Amazing APP!'
                                 ));

} catch(Exception $e) {
echo $e . '<br />';
}
}else{
echo 'ana feen?';
}

?>