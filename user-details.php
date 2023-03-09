<HEAD>
		<title>User Details</title>
	

	</HEAD>
	<BODY>
		<H1>User Details</H1>
		<a href="user-list.php">user-list</a>
		<a href="user-add.php">user-add</a>
		<a href="login.php">login page</a>
<p>
Matt Heffner
<a>Phone: (208)-863-6772</a>
<br>
<a>email: heffins5@gmail.com</a>
<br>
<a>Address: 103 Via Crescendo, Roma, IT</a>
<br>
<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];

$query = "SELECT * FROM user where id=$id ";

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
	Username: $row[username]
	Forename: $row[forename]
	Surname: $row[surname]
	Password: $row[password]	
	</pre>
	
	<form action='user-add.php' method='post'>
		<input type='hidden' name='add' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
			
	</form>
	
_END;

}

$conn->close();



?>