<?php

    $sql_server = "localhost";
    $db_username = "root";
    $db_password = "root";
    $db_name = "users_233-cwk-4";  
    $conn = mysqli_connect($sql_server, $db_username, $db_password, $db_name);
    if($conn == FALSE) 
        die("Error connecting to mysql server :". mysqli_connect_error());

?>