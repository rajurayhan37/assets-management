<?php
    include "../db/db.php";
    
    $location = $_POST['loc'];

    $sql = "INSERT INTO location(Locname) VALUES('$location')";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>