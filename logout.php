<?php

session_start();



if(isset($_SESSION['user'])){
		destroy_session_and_data();
		
		
		echo "Logout is successful <a href = 'login-form.php'>Login<a/>";
}
function destroy_session_and_data(){


	$_SESSION = array();
	setcookie(session_name(), '', time()-, '/');
	session_destroy();
}


echo "Please login <a href='login-form.php'> HERE </a>";








?>