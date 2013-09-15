<?php
require 'init.php';
include 'models/cases.php';

$_SESSION['case_id'] = $_GET['case_id'];
$session_current_case = $_SESSION['case_id'] ;

?>