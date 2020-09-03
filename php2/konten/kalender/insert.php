<?php

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sql = "INSERT INTO event (title,start,end) VALUES ('".$title."','".$start."','".$end."')";

$result = mysqli_query($koneksi,$sql);

if (! $result) {
    $result = mysqli_error($koneksi);
}
?>