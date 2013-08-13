<?php
include "../service/init.php";
include "../service/models/admins.php";

$in_session = 0;
if(ngo_admin_logged_in() === true){
$session_admin_id = $_SESSION['ngo_admin_id'];
$admin_data = admin_data($_SESSION['ngo_admin_id'],'user_name','password');
}
?>