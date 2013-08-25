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
	<?php if ($cases["closed"] == 1) $closed = "YES"; else $closed = "NO"; ?>
		<div <?php echo "id=".$cases["case_id"]; ?> >
			<h2> <?php echo $cases["title"]; ?> </h2>

			<label> Description: <?php echo $cases["description"]; ?> </label>
			</br>

			<label> Applied: <?php echo $cases["applied"]; ?> </label>
			</br>

			<label> Accepted: <?php echo $cases["accepted"]; ?> </label>
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