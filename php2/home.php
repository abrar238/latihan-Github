<?php 
if ($_GET['hal']=="home") {
	echo "Selamat Datang di Home";
} elseif ($_GET['hal']=="kontak") {
	include "konten/buku_telp/detail.php";
}elseif ($_GET['hal']=="register") {
	include "konten/buku_telp/register.php";
}elseif ($_GET['hal']=="edit") {
	include "konten/buku_telp/fedit.php";
}elseif ($_GET['hal']=="delete") {
	include "konten/buku_telp/delete.php";
}elseif ($_GET['hal']=="simpan") {
	include "konten/buku_telp/simpan.php";
}elseif ($_GET['hal']=="ubah") {
	include "konten/buku_telp/edit.php";
}
 else {
	"Bukan Home";
}
?>