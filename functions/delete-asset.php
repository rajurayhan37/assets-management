<?php
    include "../db/db.php";
    
    $assetid = $_POST['id'];
    $str = str_replace("on,", "", implode(",", $assetid)) ;
    
    $sql = "DELETE FROM assetinfo WHERE AssetId IN ({$str})";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>