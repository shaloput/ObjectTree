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
			<a href="#"><h3>Object Manager</h2></a>
		
		<?php 
			if (!isset($_SESSION['uid'])) {
				echo "<form class='login' method='post' action='login_parse.php'>
					<input type='text' name='username'>
					<input type='password' name='password'>
					<input class='btn' type='Submit' value='Log In'>";
				if (isset($_SESSION['logged']) && !$_SESSION['logged']) {
					echo "<p>Please enter correct login information and try again";
				}
				echo "</form>";
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
			
			<div class="inner" id="output_o">			
			 
			</div><!-- tree -->
		</div><!--contents -->


		<div class="contents descr">
			<?php 
				if (!isset($_SESSION['uid'])) {
				echo "<h3>Description:</h3>
					<div class=\"inner\" id=\"output_d\">

					</div>";
			} else {
				echo "<div class=\"inner\">
				Object ID:
				<input type=\"text\" id=\"oid\">
				<br>
				Object Name:
				<input type=\"text\" id=\"name\">
				<br>
				Parent ID:
				<input type=\"text\" id=\"pid\">
				<br>
				Description:
				<textarea type=\"text\" id=\"output_d\">
				</textarea>
					
				<button id=\"add\" onclick=\"javascript:add_save(1);\">Add (child)</button>
				<button id=\"add\" onclick=\"javascript:add_save(0);\">Add (root)</button>
				<button id=\"save\" onclick=\"javascript:add_save();\">Save</button>
				<button id=\"delete\" onclick=\"javascript:ajax_delete();\">Delete</button>
				</div>";
			}
			 ?>
			
				
		</div>
	</div><!-- container -->
			
	<script src="main.js" charset="utf-8"></script>

</body>
</html>