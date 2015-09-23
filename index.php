<?php session_start(); ?>
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
		
		<?php 
			if (!isset($_SESSION['uid'])) {
				echo "<form class='login' method='post' action='login_parse.php'>
					<input type='text' name='username'>
					<input type='password' name='password'>
					<input class='btn' type='Submit' value='Log In'>
				</form>";
			} else {
				echo "<p class='login'>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a>";
			}
		?>
			
		</div>
	</div>
		
	<div class="container">
		<h1>Welcome to Object Tree Manager</h1>

		<div class="contents">
		<h3>Objects:</h2>
			<div class="obj-tree">
			 <?php 
				include_once("connect.php");
				$sql = "SELECT * FROM objects WHERE parent_id=0	 ORDER BY obj_id ASC";

				$res = mysql_query($sql) or die(mysql_error());
				$objects = "";

				if (mysql_num_rows($res) > 0) {
					while ($row = mysql_fetch_assoc($res)) {
						$id = $row['obj_id'];
						$name = $row['name'];
						$descr = $row['descr'];
						$objects .= "<p>".$name."</p>";
					}

					echo $objects;
				} else {
					echo "<p>There are no object avaible yet.</p>"; 
				}

			 ?>
			</div>
		</div>
	</div>
			
	</div>
</body>
</html>