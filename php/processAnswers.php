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
			Test #<?php echo $_GET['test_number']; ?>	
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
			<h1> Test #<?php echo $_GET['test_number']; ?> </h1> 
			<?php
			    if(isset($_GET))
			    {
			        $test = $_GET['test_number'];
			        	
					$query = "SELECT `question`, `a`,`b`,`c`,`d`,`correct_answer`, `question_id` 
							 FROM `questions` 
							 WHERE `question_id` in 
							 		(SELECT `question_id`
							 		FROM `test`
							 		WHERE `test_id` = '$test')";	
					
					$result = mysqli_query($conn, $query);
				    $number=0;
				    if($result != FALSE) {
				    	$right = 0;
					    while($row = mysqli_fetch_assoc($result)) {
					    	$number++;
					    	$user_answer_code = $_GET[$row['question_id']];
					    	$user_answer_string = $row[$_GET[$row['question_id']]]; // the name of the field is the question id so fetch the question id ( 1 = a) , get the name of the field that the value is ( 1 ), then fetch in that question id which answer is the value of the field in the form ( a)
					    	$answer_code = $row['correct_answer']; // code of the correct answer
					    	$answer_string = $row[$answer_code];

					    	
							echo "<h3>";
					    	echo $number . " - " . $row['question'] . "</h3>	";

					    	if(( $user_answer_code !== 'a' )&&( $user_answer_code !== 'b' )&&( $user_answer_code !== 'c' )&&( $user_answer_code !=='d' )) {
					    		echo "<p class= 'blanck'> You did not answer this question, the right answer was: " . $answer_code . ") " . $answer_string . "</p><br>";
					    	}
					    	
					    	else if( $user_answer_code === $answer_code){
					    		echo "<p class = 'right'> Right Answer! Your answer was: " . $user_answer_code . ") " . $user_answer_string . "</p><br>";
					    		$right++;
					    	}
					    	else {
					    		echo "<p class='wrong'> Wrong answer, your answer was: " . $user_answer_code . ") " . $user_answer_string. "</p>";
					    		echo "Correct Answer: " . $answer_code . ") " . $answer_string;
					    	}					    	
					    }
						echo "<h2 class='result'> You got " . $right . " questions right out of " . $number . " questions</h2>";
						    
				    } else
				    	die("Error in database query");
				    mysqli_close($conn);
			    }
				
			?>

		</div>
	</body>
</html>
