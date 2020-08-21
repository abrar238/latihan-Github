<?php

if (isset($_GET['no'])) {
	$no=$_GET['no'];
	$sql = "DELETE FROM register WHERE no=$no";
	$query = mysqli_query($koneksi,$sql);

	if ($query) { 
		include ('?hal=kontak');
	}else{
		die('data gagal dihapus');
	}
}
?>


