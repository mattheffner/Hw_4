	<HTML>
		
		<HEAD>
		<title>Add a new user</title>
</HEAD>
<BODY>
		<H1>Add a new user</H1>
		<a href="login.php"> Login Page </a>
		<a href="user-list.php">user-list </a>
		<a href="user-add.php">user-add </a>
		<a href="user-details.php">user-details </a>
		
	
		<form method='post' action='user-add.php'>
			UserName: <br>
			<input type="text" name="username"><br>
			Forename: <br>
			<input type="text" name="forename"><br><br>
			Surname: <br>
			<input type="text" name="surname"><br><br>
			Password: <br>
			<input type="text" name="password"><br>
			<input type='submit'>
		</form>

<?php
//import credentials for db
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['username'])) 
{
	//Get data from POST object
	//$id = $_POST['id'];
	$username = $_POST['username'];
	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$password = $_POST['password'];
	
	//echo $isbn.'<br>';
	
	$query = "INSERT INTO user (username, forename, surname, password) VALUES ('$username','$forename', '$surname', '$password')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-list.php");//this will return you to the view all page
	
	
	
	
}






?>

</HTML>