<?php 
if ($_GET['page']=='rs_bukutelp' && $_GET['hal']=='hapus') {
	$hapus=$conn->prepare("DELETE FROM ams_kontak where id_kontak=$id");
	$hapus->execute();
	if ($hapus) {
		echo "<script>window.location='home.php?page=rs_bukutelp&hal=lihat'</script>";
    } else  {
		echo "Error: 100 : Query Failure to execute";
	}
} elseif ($_GET['page']=='rs_bukutelp' && $_GET['hal']=='simpan') {
	$simpan=$conn->prepare("INSERT INTO ams_kontak SET nm_kontak=?, almt=?, fax=?, ko1=?, ko2=?, ko3=?, ko4=?, ko5=?");
	$simpan->bindParam(1, $_POST['nama']);
	$simpan->bindParam(2, $_POST['alamat']);
	$simpan->bindParam(3, $_POST['fax']);
	$simpan->bindParam(4, $_POST['k1']);
	$simpan->bindParam(5, $_POST['k2']);
	$simpan->bindParam(6, $_POST['k3']);
	$simpan->bindParam(7, $_POST['k4']);
	$simpan->bindParam(8, $_POST['k5']);
	$simpan->execute();
	if ($simpan) {
		echo "<script>window.location='home.php?page=rs_bukutelp&hal=lihat'</script>";
    } else  {
		echo "Error: 100 : Query Failure to execute";
	}
}  elseif ($_GET['page']=='rs_bukutelp' && $_GET['hal']=='update') {
	$update=$conn->prepare("UPDATE ams_kategori SET kategori= ?, kode_kat= ?, kd_menu= ? WHERE id_kategori= ?");
	$update->bindParam(1, $_POST['namakat']);
	$update->bindParam(2, $_POST['kode_kat']);
	$update->bindParam(3, $_POST['kode_menu']);
	$update->bindParam(4, $_POST['id']);
	$update->execute();
	if ($update) {
		echo "<script>window.location='home.php?page=ms_kategori&hal=lihat'</script>";
    } else  {
		echo "Error: 100 : Query Failure to execute";
	}
}  elseif ($page=='ms_kategori' && $hal=='simpanset') { 
	$setting=$conn->prepare("INSERT INTO ams_formkat SET id_kat=?, form_komp=?, form_spek=?, form_os=?, form_lisensi=?, form_printer=?, form_ht=?, form_ip=?");
	$setting->bindParam(1, $_POST['id']);
	$setting->bindParam(2, $_POST['nm_komp']);
	$setting->bindParam(3, $_POST['spek']);
	$setting->bindParam(4, $_POST['os']);
	$setting->bindParam(5, $_POST['lisensi']);
	$setting->bindParam(6, $_POST['tipe_pr']);
	$setting->bindParam(7, $_POST['tipe_ht']);
	$setting->bindParam(8, $_POST['ip']);
	$setting->execute();
	if ($setting) {
		echo "<script>window.location='home.php?page=ms_kategori&hal=lihat'</script>";
    } else  {
		echo "Error: 100 : Query Failure to execute";
	}
} 
 ?>
