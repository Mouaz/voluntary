<?php
	include '../service/actions/general.php';
	include '../service/init.php';
?>
<html>
<head>
	<title>Add Case</title>
</head>
<body>
	<h1>Add Case</h1>
	<form method="POST" id="addCase" action="Case.php" enctype="multipart/form-data">
		<label>Title:</label>
		<input type="text" name="title" id="title" required>
		</br>

		<label>Description:</label>
		<input type="text" name="desc" id="desc" required>
		</br>

		<label>Location:</label>
		<input type="text" name="loc" id="loc">
		</br>

		<label>Image:</label>
		<input id ="upload"type="file" name="image" accept="image/*">
		</br>

		<button type="submit" id="addCase"> Add </button>
	</form>	
</body>
</html>