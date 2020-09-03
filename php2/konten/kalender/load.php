<?php 

$json = array();
$querry="SELECT*FROM event ORDER BY id";

$result = mysqli_query($koneksi,$query);
$eventarr = array();
while ($row = mysqli_fetch_assoc($result)){
  array_push($eventarr, $row);
}
mysqli_free_result($result);

mysqli_close($koneksi);
echo json_encode($eventarr);
 ?>