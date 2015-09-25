<?php 
	session_start();
	include_once("connect.php");

	$sql = "SELECT * FROM objects WHERE id=".$_POST['id']." LIMIT 1";
	
	$res = mysql_query($sql) or die(mysql_error());;
	$row = mysql_fetch_assoc($res);

	$id = $row['id'];
	$name = $row['name'];
	$descr = $row['descr'];
	$pid = $row['parent_id'];

	echo $id."|".$name."|".$descr."|".$pid;	
?>