<?php 

$id = $_POST['id'];
$sql = "DELETE from event WHERE id=".$id;
$query = mysali_query($koneksi, "DELETE FROM event WHERE id='$id'");

if($query)
echo json_encode(array('status'=>'success'));
else
echo json_encode(array('status'=>'failed'));

 ?>