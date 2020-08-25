<?php 
if(isset($_POST['upload'])){
  $nama = $_POST['nama'];
  $nama_file = $_FILES['gambar']['name'];
  $file_size = $_FILES['gambar']['size'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = "konten/buku_telp/image/";

  move_uploaded_file($source, $folder.$nama_file);
  $insert = mysqli_query($koneksi,"INSERT INTO upgambar VALUES(NULL,'$nama','$nama_file','$file_size')");


  if($insert){
     header('location:?hal=gambar');
  }else{
    echo "gagal upload";
  }
}
 ?>