<?php 
	$host = "localhost";
	$username = "root";
	$password = "";

	$db = "tree";

	mysql_connect($host, $username, $password) or die(mysql_error());
	mysql_select_db($db);
	mysql_set_charset('utf8');

?>