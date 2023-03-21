<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "asm";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$conn) {
        header("Location: 505.html");
    }

?>