<?php
    include "../db/db.php";
    
    $item_name = $_POST['item_name'];
    $mfg_id = $_POST['mfg_id'];
    $part_no = $_POST['part_no'];
    $serial_no = $_POST['serial_no'];
    $hwrev = $_POST['hwrev'];
    $asset_tag = $_POST['asset_tag'];
    $sw_version = $_POST['sw_version'];
    $ip_address = $_POST['ip_address'];
    $loc_id = $_POST['loc_id'];
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];
    $LastUpdate = date('Y:m:d H:m:s');

    $sql = "INSERT INTO location(ItemName, MfgId, PartNumber, SerialNumber, HwRev, AssetTag, SwVersion, IpAddress, LocId, Description, UserId, LastUpdate) VALUES(
        '$item_name',
        '$mfg_id',
        '$part_no',
        '$serial_no',
        '$hwrev',
        '$asset_tag',
        '$sw_version',
        '$ip_address',
        '$loc_id',
        '$description',
        '$user_id',
        '$LastUpdate',
    )";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>