<?php 

$json=array();
$sql="SELECT*FROM event ORDER BY id";

$result=mysqli_query($koneksi, $sql);
$event=array();
while($row = mysqli_fetch($result)){
    array_push($event, $row);
}
mysqli_free_result($result);
mysqli_close($koneksi);
echo json_encode($event);
 
?>