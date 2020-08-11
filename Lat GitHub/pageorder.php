<?php 
include "connect.php";
include "lib/dbhrs.php";
if($_GET['page']=="home") {
	echo "";
} else {
$hals=$_GET['hal'];
}
$hal=isset($_GET['page'])?$_GET['page']:null;
if (!isset($hal) || $hal=='home') {
	include "data/home.php";
} else {
	if ($hals=='buat' || $hals=='ubah' || $hals=='lihat' || $hals=='detail' || $hals=='detailnext') {
	$data="data/".$hal."/page.php";
	include $data;
	} elseif ($hals=='simpan' || $hals=='hapus' || $hals=='update' || $hals=='simpanext' || $hals=='cari') {
	$data="data/".$hal."/proses.php";
	include $data;
	} else {
	$data="data/404page.php";
	include $data;	
	}
  }
?>