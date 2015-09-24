<?php 
	session_start();
	include_once("connect.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$descr = $_POST['descr'];
	$p_id = $_POST['p_id'];

	$sql = "UPDATE objects
	SET name='".$name."', descr='".$descr."', parent_id='".$p_id."' WHERE id='".$id."';";
	
	$res = mysql_query($sql) or die(mysql_error());
?>