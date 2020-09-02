<?php
if(isset($_POST['submit'])){

    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];


    $sql = "INSERT INTO register (no, nama, jabatan, jk, agama, alamat, telp, email) VALUES ('$no', '$nama', '$jabatan', '$jk', '$agama', '$alamat', '$telp', '$email')";
   $query = mysqli_query($koneksi, $sql);

    if( $query ) {
        header('location: ?hal=kontak');
    }  else {
    die("akses ditolak");
}
}
?>