<?php
    include "../db/db.php";
    
    $manufacturer = $_POST['manufacturer'];

    $sql = "INSERT INTO manufacturer(MfgName) VALUES('$manufacturer')";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>