<?php
require '../service/models/cases.php';

//print_r($_POST);
$title = $_POST["title"];
$description = $_POST["description"];
$location = $_POST["location"];
$closed = $_POST["closed"];
//echo $_GET['case_id'];
//if(!isset($_POST['image'])){
if($_FILES["image"]["tmp_name"]==""){
echo "mafesh image";
$update_data = array(
								'title' => $title,
								'description' => $description,
								'location' => $location,
								'closed' => $closed);
}else{
echo "fe image";
//if($_POST['image']!=""){
	 move_uploaded_file($_FILES["image"]["tmp_name"], "../Images Uploaded/" . $_FILES["image"]["name"]);
	$image = "Images Uploaded/".$_FILES["image"]["name"];
	
	$update_data = array(
								'title' => $title,
								'description' => $description,
								'location' => $location,
								'closed' => $closed,
								'image' => $image);
								
}
/*
if($_POST['image']!=""){
	 move_uploaded_file($_FILES["image"]["tmp_name"], "../Images Uploaded/" . $_FILES["image"]["name"]);
	$image = "Images Uploaded/".$_FILES["image"]["name"];
	
	$update_data = array(
								'title' => $title,
								'description' => $description,
								'location' => $location,
								'closed' => $closed,
								'image' => $image);
								}else{
								$update_data = array(
								'title' => $title,
								'description' => $description,
								'location' => $location,
								'closed' => $closed);
								}
								*/
	update_case($_GET['case_id'],$update_data);
	echo "Case successfully updated...";
	header('Location: case-profile.php?case_id='.$_GET['case_id'].'&success=1');
	exit();
	

?>