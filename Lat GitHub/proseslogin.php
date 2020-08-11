<?php
include "connect.php";
include "lib/dbhrs.php";
include "lib/function.php";

error_reporting(0);
$proses=isset($_POST['proses'])?$_POST['proses']:null;
if ($proses == "login") {
	$Username 	= FullAntiInject($_POST['Username']);
	$Password 	= Enkripsi(FullAntiInject($_POST['Password']));

$query=$dbhrs->query("SELECT id_user, nik, level  FROM hrs_user WHERE nik='$Username'AND password='$Password'");
	$count=$query->rowCount();
	if ($count>0) {
		$res=$query->fetch(PDO::FETCH_ASSOC);
		$resKaryawan=$dbhrs->query("SELECT id_divisi, id_seksi, nm_karyawan FROM hrs_karyawan WHERE nik='$res[nik]'")->fetch(PDO::FETCH_ASSOC);
		session_start();
		$_SESSION['IdUser'] 	= $res['id_user']; 
		$_SESSION['Nik'] 		= $res['nik']; 
		$_SESSION['NmKaryawan'] = $resKaryawan['nm_karyawan'];
		$_SESSION['Level'] 		= $res['level'];
		$_SESSION['IdDivisi'] 	= $resKaryawan['id_divisi'];
		$_SESSION['IdSeksi'] 	= $resKaryawan['id_seksi'];
		echo "sukses";
		} else {
		echo "gagal";
		}
}

?>