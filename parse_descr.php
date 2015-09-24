<?php 
	session_start();
	include_once("connect.php");

	$sql = "SELECT descr FROM objects WHERE id=".$_POST['id']." LIMIT 1";
	
	$res = mysql_query($sql) or die(mysql_error());;
	$row = mysql_fetch_assoc($res);

	echo $row['descr'];
	
?>