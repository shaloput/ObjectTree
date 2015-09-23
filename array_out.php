<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	include_once("connect.php");
	function getObjects() {
	    $sql = mysql_query("SELECT id, name, parent_id FROM objects");
	    $res = array();
	    while ($row = mysql_fetch_array($sql)) {
	        $res[$row["parent_id"]][] = $row;
	    }
	    return $res;
	}
	 
	//В переменную $objects_arr записываем все объекты
	$objects_arr = getObjects();

	print_r ($objects_arr);
	?>
</body>
</html>
