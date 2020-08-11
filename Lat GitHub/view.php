<?php
 include("koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>...</title>
</head>
<body>
<h3>Tampilan</h3>
<nav><a href="register1.php"> daftar baru</a></nav>
<br>

<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telp</th>
		</tr>
	</thead>

		<?php
		$sql="SELECT*FROM register";
		$query= mysqli_query($koneksi, $sql);
		while ($anggota=mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<td>".$anggota['no']."</td>";
			echo "<td>".$anggota['nama']."</td>";
			echo "<td>".$anggota['alamat']."</td>";
			echo "<td>".$anggota['telp']."</td>";

			echo "<td>";
			echo "<a href='form_edit.php? no=".$anggota['no']."'>edit</a>|" ; 
			echo "<a href='delete.php? no=".$anggota['no']."'>delete</a>";
			echo "</td>";
			echo "</tr>";
		}
		?>
</table>

</body>
</html>