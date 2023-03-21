<?php
    include "../db/db.php";
    
    $locid = $_POST['id'];
    $str = str_replace("on,", "", implode(",", $locid)) ;
    
    $sql = "DELETE FROM location WHERE LocId IN ({$str})";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>