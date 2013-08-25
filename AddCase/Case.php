<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	//session_start();
	//$rep_id = $_SESSION["rep_id"];

	//_________FOR TESTING ONLY__________\\
	$rep_id = 2;

	$title = $_POST["title"];
	$desc = $_POST["desc"];
	$loc = $_POST["loc"];

	move_uploaded_file($_FILES["image"]["tmp_name"], "../Images Uploaded/" . $_FILES["image"]["name"]);
	$image = "Images Uploaded/".$_FILES["image"]["name"];

	$getNgoId = mysql_query("SELECT ngo_id FROM ngo_rep WHERE ngo_rep_id = ".$rep_id." ");
	$result = mysql_fetch_array($getNgoId);
	$ngo_id = $result["ngo_id"];

	$query = "INSERT INTO Cases (title, description, location, closed, image, ngo_id) 
				 VALUES ('".$title."', '".$desc."', '".$loc."', 0, '".$image."' , ".$ngo_id.")";
	mysql_query($query);
	echo "Sucess";
	
?>