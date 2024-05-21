<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "hackacademy";
    
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    if (!$conn)
        die("Not connection: " . mysqli_connect_error());   
?>