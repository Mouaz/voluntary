<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	$case_id = $_GET["id"];
	$result = mysql_query("SELECT u.user_id, user_name, email, birth_date, image, job_description, phone_number FROM user u,User_Case uc WHERE u.user_id = uc.user_id AND case_id = ".$case_id) or die(mysql_error());

	$accResult = mysql_query("SELECT accepted_id FROM Cases WHERE case_id = ".$case_id);
	$accRow = mysql_fetch_row($accResult);


?>
<html>
<head>
	<title>View Volunteers</title>
	<script src="volun.js" ></script>
</head>
<body>
	<h1>View Volunteers</h1>
	<?php while ($users = mysql_fetch_array($result)) { ?>
			<label>Name: <?php echo $users["user_name"]; ?></label> 
			</br>

			<label>Birthdate: <?php echo $users["birth_date"]; ?></label>
			</br>

			<label>Job Discription: <?php echo $users["job_description"]; ?></label>
			</br>

			<label>Phone Number: <?php echo $users["phone_number"]; ?> </label>
			</br>

			<label>Email: <?php echo $users["email"]; ?></label>
			</br>

			<?php
			echo "<label id='".$users["user_id"]."' name='accept' onclick='accepting(".$users["user_id"].",".$case_id.");'>";
			?>
				<?php 
					if ($accRow[0] == 0)
						echo "Accept Volunteer";
					else if ($accRow[0] == $users["user_id"])
						echo "Accepted";
				?>
			</label>
			</br>	
			
			<?php 
				if ($users["image"] == "")
					echo " <img src='../No Image'>";
				else
					echo " <img src='".$users["image"]."'>";
			?>
			</br>		

			<label>______________________________________________________</label></br></br></br>
	<?php } ?>
</body>
</html>