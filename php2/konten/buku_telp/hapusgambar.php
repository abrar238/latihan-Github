<?php
if (isset($_GET['idg'])) {
	$idg=$_GET['idg'];
	$sql = "DELETE FROM upgambar WHERE idg=$idg";
	$query = mysqli_query($koneksi,$sql);

	if ($query) { 
		header('location: ?hal=gambar');
	}else{
		die('data gagal dihapus');
	}
}

?>