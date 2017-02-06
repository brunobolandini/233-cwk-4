<?php 
    ini_set("error_reporting",E_ALL);
    ini_set("log_errors","1");
    ini_set("error_log","php_errors.txt");
	
	session_start();  
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Home
		</title>
		<link rel="stylesheet" type="text/css" href="../css/theme_dark.css">
	</head>


	<!-- Set the class of font size --> 
	<body class="font_100">
	
		<div id ="header_panel">
			<h1> COMP233 - Multiple Choices Tests <br></h1>
		</div>
		<div id ="navigation_panel_left">
			<ul >
				<li><a href="index.php">Home</a></li>
				<li><a href="processLinks.php?testID=1"> Test #1</a><br></li>
		        <li><a href="processLinks.php?testID=2"> Test #2</a><br></li>
		        <li><a href="processLinks.php?testID=3"> Test #3</a><br></li>

				<?php
				if(isset($_SESSION["logged_in"])) { 

					//<--! DISPLAY ONLY IF USER IS LOGGED IN -->
				    
				    echo "<li><a href='logout.php'>Log Out</a></li>";
				    
				}
				else {	//<!-- DISPLAY ONLY IF USER IS NOT LOGGED -->
				    echo "<li><a href ='login.php'>Log In</a></li>";
				}
				?>

			</ul>

		</div>
		<div id ="content_box">
			<h3> Home page </h3>
			<p> This page displays a set of online tests about Internet Applications development.</p>
		</div>
	</body>
</html>