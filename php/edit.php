<?php
include("koneksi.php");
if(isset($_POST['simpan'])){

    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];


    $sql = "UPDATE register SET nama='$nama', jk='$jk', alamat='$alamat', telp='$telp', email='$email' WHERE no='$no'";
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