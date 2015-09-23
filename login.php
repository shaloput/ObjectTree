<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "test";

mysql_connect($host, $user, $pass);
mysql_select_db($db);


if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
	$res = mysql_query($sql);

	if (mysql_num_rows($res) == 1) {
		echo "You have successfully logged in.";
		exit();
	} else {
		echo "Invalid login information. Please return to the previous page";
		exit();
	}
}

?>
