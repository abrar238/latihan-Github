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
elseif ($_GET['hal']=="upload") {
	include "konten/buku_telp/upload.php";
}
elseif ($_GET['hal']=="uploadfile") {
	include "konten/buku_telp/uploadfile.php";
}
elseif ($_GET['hal']=="deletefile") {
	include "konten/buku_telp/deletefile.php";
}
elseif ($_GET['hal']=="view") {
	include "konten/buku_telp/view.php";
}
elseif ($_GET['hal']=="gambar") {
	include "konten/buku_telp/uploadgambar.php";
}
elseif ($_GET['hal']=="uploadgambar") {
	include "konten/buku_telp/uploadfilegambar.php";
}
elseif ($_GET['hal']=="hapusgambar") {
	include "konten/buku_telp/hapusgambar.php";
}
 else {
	"Bukan Home";
}
?>