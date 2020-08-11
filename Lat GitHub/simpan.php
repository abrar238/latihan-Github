<?php
include("koneksi.php");
if (isset($_POST['submit'])){
	 $no = $_POST['no'];
	 $nama = $_POST['nama'];
	 $alamat = $_POST['alamat'];
	 $telp = $_POST['telp'];
	
$sql="INSERT INTO register (no,nama,alamat,telp) VALUE ('$no','$nama','$alamat','$telp')";
$query= mysqli_query($koneksi,$sql);

if ($query) {
	header('location:view.php?status=sukses');
}else{
	header('location:view.php?status=gagal');
	}
} 	else {
	die("akses ditolak");
}
?>