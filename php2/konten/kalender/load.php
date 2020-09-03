<?php
    require_once "$koneksi";

    $json = array();
    $sqlQuery = "SELECT * FROM events ORDER BY id";

    $result = mysqli_query($koneksi, $sqlQuery);
    $event = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($event, $row);
    }
    mysqli_free_result($result);

    mysqli_close($koneksi);
    echo json_encode($event);
?>