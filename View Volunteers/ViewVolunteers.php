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
				if ($users["image"] == "")
					echo " <img src='../No Image'>";
				else
					echo " <img src='".$users["image"]."'>";
			?>
			</br>

			<label>
				<?php if ($_GET["acc"] == "0000") { ?>
				<label> Accept </label>
				<?php } else if ($case_id == ) {?>

				<?php } ?>
			</label>

			<label>______________________________________________________</label></br></br></br>
	<?php } ?>
</body>
</html>