<?php
include("koneksi.php");
if(isset($_POST['submit'])){

    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];


    $sql = "INSERT INTO register (no, nama, jk, alamat, telp, email) VALUE ('$no', '$nama', '$jk', '$alamat', '$telp', '$email')";
    $query = mysqli_query($koneksi, $sql);

    if( $query ) {
        header('location: view.php?status=sukses');
    } else {
        header('location: view.php?status=gagal');
    }
} else {
    die("akses ditolak");
}
?>