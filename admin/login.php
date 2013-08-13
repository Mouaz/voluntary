<?php
//include 'http://vmm.vacau.com/service/init.php';
//include $_SERVER['DOCUMENT_ROOT'] . "/service/init.php";
include "../service/init.php";
include "../service/models/admins.php";

if (isset($_POST['login-form'])) {
 
					$user_name = $_POST['user_name'];
					$password = $_POST['password'];
					
					echo $user_name.$password;
					if(empty($user_name) === true || empty($password) === true){
					$errors[] = 'yabni etaki allah we da5al values';
					/*echo '<div class="alert alert-error">
						<a class="close"></a>
						complete empty field.
					  </div>';*/
					}elseif(admin_exists($user_name) === false){
					echo '<div class="alert alert-error">
						<a class="close"></a>
						User name does not exist.
					  </div>';
					}else{
					 $login = login($user_name,$password);
					 //echo $password;
					 //echo $login;
					 if($login === false){
					 echo '<div class="alert alert-error">
						<a class="close"></a>
						Username and password does not match.
					  </div>';
					}else{
						session_start();
						$_SESSION['user_id'] = $login;
						echo 'login succeeded';
						//header('Location: http://taski.herobo.com/schedule.html');
						//header('Location: schedule.html');
						//exit();
						//set user session
						//redirect to home
					}
					}
					}
?>