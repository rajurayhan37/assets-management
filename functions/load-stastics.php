<?php
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_mfg FROM manufacturer");
    $stmt->execute();
    $result = $stmt->get_result();
    $total_mfg = $result->fetch_object()->total_mfg;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total_location FROM location");
    $stmt->execute();
    $result = $stmt->get_result();
    $total_location = $result->fetch_object()->total_location;


    $stmt = $conn->prepare("SELECT COUNT(*) AS total_asset FROM assetinfo");
    $stmt->execute();
    $result = $stmt->get_result();
    $total_asset = $result->fetch_object()->total_asset;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total_user FROM username");
    $stmt->execute();
    $result = $stmt->get_result();
    $total_user = $result->fetch_object()->total_user;
?>