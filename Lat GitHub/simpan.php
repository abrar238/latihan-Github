<?php

 $no = $_POST['no'];
 $nama = $_POST['nama'];
 $alamat = $_POST['alamat'];
 $telp = $_POST['telp'];

include("koneksi.php");
mysqli_query("insert into register(no,nama,alamat,telp) values (
	'$no','$nama','$alamat','telp')") or die ("menyimpan gagal<meta http-equiv=refresh content=4; url=register1.php>");
echo "menyimpan berhasil<meta http-equiv=refresh content=4; url=register1.php>";

?>