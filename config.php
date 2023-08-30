<?php 
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "mydb";
    $conn = new mysqli("localhost", "", "root", "mydb");
    if($conn->connect_error){
        die("Connection Failed" . $conn->connect_error);
    }
?>