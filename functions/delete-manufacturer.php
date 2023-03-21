<?php
    include "../db/db.php";
    
    $mfgid = $_POST['id'];
    $str = str_replace("on,", "", implode(",", $mfgid)) ;
    
    $sql = "DELETE FROM manufacturer WHERE MfgId IN ({$str})";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>