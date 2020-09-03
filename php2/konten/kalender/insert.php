<?php 

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$endy = isset($_POST['endy']) ? $_POST['endy'] : "";

$insert = "INSERT INTO event (title,start,endy) VALUES ('".$title"','".$start"','".$endy"')";
$result = mysqli_query($koneksi, $insert);

if(!$result){
 	$result=mysqli_error($koneksi);
 }
 ?>
