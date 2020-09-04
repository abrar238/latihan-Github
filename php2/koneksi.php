<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "latihan";


$koneksi = mysqli_connect($server,$user,$password,$nama_database);


if(!$koneksi){
	die("gagal terhubung:".mysqli_connect_error());
}


$searchTerm = $_GET['term'];
$query = $koneksi->query("SELECT*FROM event WHERE title LIKE '%".$searchTerm."%' ORDER BY id ASC ");
	
	while($row = $query->fetch_assoc()){
		$data[] = $row['title'];
	}
	echo json_encode($data);
?>