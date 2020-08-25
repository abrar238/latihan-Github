<?php
$id=trim($_GET['id']);
$sql ="DELETE FROM upload WHERE id='$id'";
$query = mysqli_query($koneksi, $sql);

if( $query ) {
        header('location: ?hal=upload');
    }  else {
    die("akses ditolak");
}
?>