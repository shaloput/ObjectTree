<?php

$host = "localhost";
$user = "root";
$pass = "osminog888";
$db = "tree";

mysql_connect($host, $user, $pass);
mysql_select_db($db);

if (isset($_POST['username'])) {

	$username = $_POST('username');
	$password = $_POST('password');

	$sql = "select * from users where username='".$username."' and password='".$password."' limit 1";
	$res = mysql_query($sql);

	if (mysql_num_rows($res) == 1) {
		echo "You have successfully logged in";
		exit();
	} else {
		echo "Invalid login information. Please return to previous page";
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Object tree</title>
</head>
<body>
	
	<div class="header">
		<div class="container">
			<h3>Object Manager</h2>
		
		<form class="login" action="index.php">
			<input type="text" name="username">
			<input type="password" name="password">
			<input class="btn" type="Submit" value="Log In">
		</form>
			
		</div>
	</div>
		
	<div class="container">
		<h1>Welcome to Object Tree Manager</h1>

		<div class="contents">
			
		</div>
	</div>
			
	</div>
</body>
</html>