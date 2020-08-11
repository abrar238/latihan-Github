<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "latihan";


$koneksi = mysqli_connect($server,$user,$password,$nama_database);


if(!$koneksi){
	die("gagal terhubung:".mysqli_connect_error());
}

?>