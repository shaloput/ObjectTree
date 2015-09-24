<?php 
	session_start();
	include_once("connect.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$descr = $_POST['descr'];
	$p_id = $_POST['p_id'];

	$nid = $id + 1;

	$sql = "DELETE FROM objects WHERE id='".$id."'";
	
	$res = mysql_query($sql) or die(mysql_error());
	echo $res;

?>