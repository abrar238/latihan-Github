<h1>Hasil Upload File</h1>
<hr>
<?php
$sql = "SELECT*FROM upload ORDER BY id desc";
$query = mysqli_query($koneksi,$sql);
$file  = mysqli_fetch_array($query);
?>

<table>
<tr>
	<td>Judul :</td>
	<td> <?php echo $file['judul'];?></td>
</tr>
<tr>
	<td>Nama PDF :</td>
	<td> <?php echo $file['nama_file'];?></td>
</tr>
</table>
<hr>
<h5><a href="?hal=upload">Kembali</a></h5>
<hr>
 <embed src="konten/buku_telp/file/<?php echo $file['nama_file'];?>" type="application/pdf" width="800" height="600" ></embed>