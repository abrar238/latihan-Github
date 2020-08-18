<?php 
if ($_GET['hal']=="home") {
	echo "Selamat Datang di Home";
} elseif ($_GET['hal']=="kontak") {
	include "konten/buku_telp/detail.php";
}elseif ($_GET['hal']=="register") {
	include "konten/buku_telp/register.php";
}elseif ($_GET['hal']=="edit") {
	include "konten/buku_telp/fedit.php";
}
 else {
	"Bukan Home";
}
?>