<?php
include("koneksi.php");

if (isset($_GET['no'])) {
	$no=$_GET['no'];
	$sql = "DELETE FROM register WHERE no=$no";
	$query = mysqli_query($koneksi,$sql);

	if ($query) {
		header('berhasil dihapus');
	}else{
		die('gagal dihapus');
	}
}else{
	die("akses ditolak");
}



?>


