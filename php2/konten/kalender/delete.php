<?php 

$id=$_POST['id'];
$sql="DELETE from event WHERE id".$id;

mysqli_query($koneksi, $sql);
echo mysqli_affected_rows($koneksi);
mysqli_close($koneksi);

?>