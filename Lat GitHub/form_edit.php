<?php

include("koneksi.php");


if(!isset($_GET['no']) ){
    header('location: view.php');
}


$no = $_GET['no'];


$sql = "SELECT * FROM register WHERE no=$no";
$query = mysqli_query($koneksi, $sql);
$anggota = mysqli_fetch_assoc($query);


if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>......</title>
</head>
<body>
<from action="edit.php" method="POST">
		<table>
			<tr>
				<td>No</td>
				<td><input type="text" name="no" value="<?php echo $anggota['no'] ?>"/></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $anggota['nama'] ?>" /></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $anggota['alamat'] ?></textarea></td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><input type="text" name="telp" value="<?php echo $anggota['telp'] ?>" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="simpan" name="simpan"/></td>
			</tr>
		</table>
	</from>



</body>
</html>