<HEAD>
		<title>User List</title>
	

	</HEAD>
	<BODY>
	<HEAD>
		<title>User List</title>
	<a href="user-list.php">user-list</a>
		<a href="user-add.php">user-add</a>
		<a href="user-details.php">user-details</a>
		<a href="login-form.php"> Login Page </a>
		<br><br>	
	</body>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM user";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ID: <a href='user-details.php?id=$row[id]'>$row[id]</a>
	Forename: $row[forename]
	Surname: $row[surname]
	</pre>
	
	<form action='user-add.php' method='post'>
		<input type='hidden' name='add' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
	</form>
	
_END;

}

$conn->close();



?>