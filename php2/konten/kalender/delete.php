<?php 

$id = $_GET['id'];
$sqlDelete = "DELETE from event WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
 ?>