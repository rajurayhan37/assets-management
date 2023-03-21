<?php
    include "../db/db.php";
    
    $manufacturer = $_POST['manufacturer'];
    $id = $_POST['id'];

    $sql = "UPDATE manufacturer SET MfgName = '$manufacturer' WHERE MfgId = '$id'";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>