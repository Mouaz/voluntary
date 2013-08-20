<?php
	include '../service/actions/general.php';
	include '../service/init.php';
	session_start();
?>
<html>
	<head>
		<title>Add NGO Representative</title>
		<script src="validate.js"></script>
		

	</head>

	<body>
		
		<h1>Add NGO Representative</h1>
		    	<form method="POST" action="addrep.php" id="add" onsubmit="return validate_all();">

			
				<label>username:</label>
				<input type="text" name="username" id="username" onblur="validate_username()" required>
				<label id="req_username" class="required"></label>

				</br>
				<label>email:</label>
				<input type="email" name="email" id="email" onblur="validate_email()" required>
				<label id="req_email" class="required"></label>
								
				</br>
				<label>password:</label>
				<input type="password" name="password" id="pass1" required>

				</br>
				<label>confirm password:</label>
				<input type="password" name="pass_confirm" id="pass2" onblur="check_pass()" required>
				<label id="req_pass2" class="required"></label>
				</br>

				<button type="submit" id="signUp">
					submit
				</button>
		      

		      </form>
		  
	</body>
</html>