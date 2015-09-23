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
			<a href="index.php"><h3>Object Manager</h2></a>
		
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
			<h3>Objects:</h3>
			<div class="inner">			
			 <?php 
				include_once("connect.php");
				/*$sql = "SELECT * FROM objects WHERE parent_id=0	 ORDER BY obj_id ASC";

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
				}*/
				
				
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



				function OutTree($parent_id, $lvl) {
				    global $objects_arr; //Делаем переменную $objects_arr видимой в функции
				    
				    if (isset($objects_arr[$parent_id])) { //Если объект с таким parent_id существует
				        
				        echo("<ul>\n");

				        foreach ($objects_arr[$parent_id] as $value) { //Обходим
				            
				            $id = $value["id"];

							echo("<li>\n");
							echo("<a href=\""."?id=".$id."\">".$id." ".$value["name"]." ".$value["parent_id"]."</a>"."  \n");
							
						if (isset($objects_arr[$id])) {
							echo ("<a class='expand' href='#''>+</a> \n");								
						}
						
							OutTree($id, $lvl); 
							$lvl--;
						}

				        
				    	echo("</ul>\n");
				    }
				}
				 
				outTree(0, 0);
				 
				?>
			</div><!-- tree -->
		</div><!--contents -->


		<div class="contents descr">
			<h3>Description:</h3>
			<div class="inner">
				<?php 
					if (isset($_GET['id'])) {
					
						$oid = $_GET['id'];
					
						$sql2="SELECT descr FROM objects WHERE id=".$oid." LIMIT 1";
						$res2 = mysql_query($sql2) or die(mysql_error());
						
						if (mysql_num_rows($res2) > 0) {
						while ($row = mysql_fetch_assoc($res2)) {
							$descr = $row['descr'];
						}
						echo $descr;
						} else {
						echo "<p>There are no Description for this object</p>"; 
						}
					}
				 ?>
			</div>
		</div>
	</div><!-- container -->
			
	</div>
</body>
</html>