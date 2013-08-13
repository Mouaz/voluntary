<?php
include "../service/init.php";
include "../service/models/admins.php";

$in_session = 0;
if(admin_logged_in() === true){
$session_admin_id = $_SESSION['admin_id'];
$admin_data = admin_data($_SESSION['admin_id'],'user_name','password');
}
?>