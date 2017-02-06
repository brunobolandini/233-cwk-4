<?php
	session_start();		
	require_once("db.php");
	
	$username = $_POST["uname"];
	$password = $_POST["pwd"];
    
    $query = "SELECT `password` 
    		 from `users`	
    		 WHERE `username`= '$username'";
	
	
    $result = mysqli_query($conn, $query);
	/*If the connection cannot be established mysqli_connect will return FALSE. 
	 * In such a case display an error message to the user.  
	 * mysqli_connect_error() displays the error in the previous connection*/
	
    if($result) {
		$row = mysqli_fetch_assoc($result);		
		
		if($row['password'] === $password){
			$_SESSION['logged_in'] = 'true';
			header("location: ./../php/index.php" );
		}    	 
		else {
		    header("location: ./../php/login.php" );
		}
    }
		
    else
        die(mysqli_connect_error());
	
    mysqli_close($conn);

?>