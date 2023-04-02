<?php
    include "../db/db.php";
    $id = $_POST['asset_id'];
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

    $sql = "UPDATE assetinfo SET ItemName = '$item_name', MfgId = '$mfg_id', PartNumber = '$part_no', SerialNumber = '$serial_no', HwRev = '$hwrev', AssetTag = '$asset_tag', SwVersion = '$sw_version', IpAddress = '$ip_address', LocId = '$loc_id', Description = '$description', UserId = '$user_id', LastUpdate = '$LastUpdate' WHERE AssetId = '$id'";
    if(mysqli_query($conn, $sql)) {
        echo 1;
    }else {
        echo 0;
    }
?>