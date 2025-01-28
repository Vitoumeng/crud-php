<?php 
    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "student_management";

    $cnn = new mysqli($host, $user, $psw, $db);

    if ($cnn->connect_error) {
        die("Connection failed: ". $cnn->connect_error);
    }
?>