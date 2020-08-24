<?php
$tipe_file = $_FILES['nama_file']['type'];
if ($tipe_file == "application/pdf") 
{
 $judul     = trim($_POST['judul']);
 $nama_file = trim($_FILES['nama_file']['name']);

 $sql = "INSERT INTO upload (judul, nama_file) VALUES ('$judul', '$nama_file') ";
 mysqli_query($koneksi,$sql);


 $query = mysqli_query($koneksi,"SELECT id FROM upload ORDER BY id DESC LIMIT 1");
 $data  = mysqli_fetch_array($query);

 $generate  = date("ymd_his_").rand(1111,9999);
 $nama_baru = $generate.".pdf"; 
 $file_temp = $_FILES['nama_file']['tmp_name']; 
 $folder    = "konten/buku_telp/file"; 

 move_uploaded_file($file_temp, "$folder/$nama_baru"); 
 mysqli_query($koneksi,"UPDATE upload SET nama_file='$nama_baru' WHERE id='$data[id]' ");

 header('location:?hal=upload'); 

} else
{
 echo "Gagal Upload! <a href='?hal=upload'> Kembali </a>";
}

?>