<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	session_start();
	//$rep_id = $_SESSION["rep_id"];

	//_________FOR TESTING ONLY__________\\
	$rep_id = 2;

	$getNgoId = mysql_query("SELECT ngo_id FROM ngo_rep WHERE ngo_rep_id = ".$rep_id." ");
	$result = mysql_fetch_array($getNgoId);
	$ngo_id = $result["ngo_id"];

	$getCases = mysql_query("SELECT * FROM Cases WHERE ngo_id = ".$ngo_id);
?>

<html>
<head>
	<title>Cases List</title>
	<script src="cases.js"></script>
</head>
<body>
	<h1>Cases of my NGO</h1>

	<?php while ($cases = mysql_fetch_array($getCases)) { ?>
	<?php 
		if ($cases["closed"] == 1) {
			$nameResult = mysql_query("SELECT user_name FROM user WHERE user_id = ".$cases["accepted_id"]);
			$nameArray = mysql_fetch_array($nameResult);
			$closed = "YES </br> Accepted: ".$nameArray["user_name"];
		} 
			else $closed = "NO"; 
	?>
		<div <?php echo "id=".$cases["case_id"]; ?> >
			<h2> <?php echo $cases["title"]; ?> </h2>

			<label> Description: <?php echo $cases["description"]; ?> </label>
			</br>

			<label> Location: <?php echo $cases["location"]; ?> </label>
			</br>

			<label> Closed: <?php echo $closed; ?> </label>
			</br>

			<label <?php echo "onclick='deletion(".$cases["case_id"].");'";?> > Delete </label>
			</br>

			<?php echo "<img src='../".$cases["image"]."' / height='250'>"; ?>
			</br>
			<label>______________________________________________________________________</label>
			</br></br></br>
		</div>

	<?php } ?>

</body>
</html>