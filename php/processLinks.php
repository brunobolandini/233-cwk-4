<?php
    //Retreive the GET data from the URL. The php processor just looks at the URL to populate the data in the $_GET variable.
    //It does not care whether the data came from a FORM or was manually put in a URL
    session_start();
	require_once("db.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Test #<?php echo $_GET['testID']; ?>	
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
			<h1> Test #<?php echo $_GET['testID']; ?> </h1> 
			<?php
			    if(isset($_GET))
			    {
			        $test = $_GET['testID'];
			        	
					$query = "SELECT `question`, `a`,`b`,`c`,`d`, `question_id` 
							 FROM `questions` 
							 WHERE `question_id` in 
							 		(SELECT `question_id`
							 		FROM `test`
							 		WHERE `test_id` = '$test')";	
					
					$result = mysqli_query($conn, $query);
				    $number=1;
				    if($result != FALSE) {

					    echo"<form action='processAnswers.php' method='GET'> ";					    
					    while($row = mysqli_fetch_assoc($result)) {
						echo "<h3> ";
					    	echo $number . " - " . $row['question'] . "</h3>	";
					    	echo "A) <input type='radio' id='" .$row['question_id'] . "_a' name='" .$row['question_id'] . "' value='a'> 
							<label for='" .$row['question_id'] . "_a'> " .$row['a'] . "</label><br>";
							echo "B) <input type='radio' id='" .$row['question_id'] . "_b' name='" .$row['question_id'] . "' value='b'>
							<label for='" .$row['question_id'] . "_b'> " .$row['b'] . "</label><br>";									
							echo "C) <input type='radio' id='" .$row['question_id'] . "_c' name='" .$row['question_id'] . "' value='c'> 
							<label for='" .$row['question_id'] . "_c'> " .$row['c'] . "</label><br>";
							echo "D) <input type='radio' id='" .$row['question_id'] . "_d' name='" .$row['question_id'] . "' value='d'> 
							<label for='" .$row['question_id'] . "_d'>" .$row['d'] . "</label><br>";	
							
					    	$number++;
					    	}
					    echo 
					    "<input type='hidden' name='test_number' value='" . $test . "'> ";
				    } else
				    	die("Error in database query");
				    mysqli_close($conn);
			    }
				if(isset($_SESSION["logged_in"])) { 
					//<--! DISPLAY ONLY IF USER IS LOGGED IN -->
				    echo "<br><input type='submit' value='submit'></fieldset></form>";   
				}
			?>

		</div>
	</body>
</html>
