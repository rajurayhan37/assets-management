<?php
    include "../db/db.php";
    
    $location = $_POST['loc'];
    $id = $_POST['id'];

    $sql = "UPDATE location SET Locname = '$location' WHERE LocId = '$id'";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>