<?php
if ($_POST['jabatan']=='NULL') {
        echo "<script type='text/javascript'>alert('Error');history.go(-1);</script>";
    } else{

if(isset($_POST['simpan'])){

    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $sql = "UPDATE register SET nama='$nama', jabatan='$jabatan', jk='$jk', agama='$agama', alamat='$alamat', telp='$telp', email='$email' WHERE no='$no'";
    $query = mysqli_query($koneksi, $sql);
    if( $query ) {
        header('location: ?hal=kontak');
    } else {
        die("akses ditolak");
    }
} 
}
?>