<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$case_id = $_GET["id"];
	$result = mysql_query("SELECT u.user_id, user_name, email, birth_date, image, job_description, phone_number FROM user u,User_Case uc WHERE u.user_id = uc.user_id AND case_id = ".$case_id) or die(mysql_error());

?>
<html>
<head>
	<title>View Volunteers</title>
</head>
<body>
	<h1>View Volunteers</h1>
	<?php
		while ($users = mysql_fetch_array($result)) {
			echo "<label>Name: ".$users["user_name"]."</label> </br>";
			echo "<label>Birthdate: ".$users["birth_date"]."</label> </br>";
			echo "<label>Job Discription: ".$users["job_description"]."</label> </br>";
			echo "<label>Phone Number: ".$users["phone_number"]."</label> </br>";
			echo "<label>Email: ".$users["email"]."</label> </br>";
			echo "<img src=".$users["image"]."> </br>";
			echo "<label>______________________________________________________</label></br></br></br>";
			
		}
		 
	?>
</body>
</html>