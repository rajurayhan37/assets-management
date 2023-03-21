<?php
    include "../db/db.php";
    $stmt = $conn->prepare("SELECT * FROM location");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = mysqli_fetch_assoc($result)) {

    }


?>