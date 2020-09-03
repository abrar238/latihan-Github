<?php 

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$endy = $_POST['endy'];

$sql="UPDATE event SET title='".$title."', start='".$start."', endy='".$endy."' WHERE id='".$id."' ";
mysqli_query($koneksi, $sql);
mysqli_close($koneksi);


 ?>