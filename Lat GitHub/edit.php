<?php
include("koneksi.php");
if (isset($_POST['simpan'])) {
	 $no = $_POST['no'];
	 $nama = $_POST['nama'];
	 $alamat = $_POST['alamat'];
	 $telp = $_POST['telp'];

	 $sql= "UPDATE register SET nama='$nama', alamat='$alamat', telp='$telp' WHERE no=$no";
	 $query = mysqli_query($koneksi, $sql);
if( $query ) {
        header('location:view.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses ditolak...");
}

?>