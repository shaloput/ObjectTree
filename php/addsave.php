<?php 
	session_start();
	include_once("connect.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$descr = $_POST['descr'];
	$p_id = $_POST['p_id'];

	if ($_POST['is_root']!='undefined') {

		$is_root = $_POST['is_root'];
		$fp_id = $id*$is_root;

		$sql = "INSERT INTO `objects`(`name`, `descr`, `parent_id`) VALUES ('".$name."','".$descr."','".$fp_id."')";
	} else {
		$sql = "UPDATE objects
		SET name='".$name."', descr='".$descr."', parent_id='".$p_id."' WHERE id='".$id."';";
	}
		$res = mysql_query($sql) or die(mysql_error());

?>