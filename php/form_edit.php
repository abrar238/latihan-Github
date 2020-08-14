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
<html lang="en">
<head>
  <title>Example</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <a class="navbar-brand " href="#">
    <img class="rounded-circle" src="img/lg.jpg " alt="logo" style="width:40px;">
  </a>
  

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbardrop">
        Home
      </a>
      </li>
      <li class="nav-item dropdown">
     <a class="nav-link" href="#" id="navbardrop">
        Member
      </a>
      </li>
      <li class="nav-item dropdown">
     <a class="nav-link" href="#" id="navbardrop">
        Register
      </a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        About
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Setting
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
      </div>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div class="container">
    <h3>Edit Data Anggota</h3>

    <form class="needs-validation" novalidate action="edit.php" method="POST">

	<div class="col-md-3 ">
      <input type="hidden" class="form-control" id="no" name="no" value="<?php echo $anggota['no'] ?>" >
    </div>
    <br>
    <div class="col-md-3 ">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota['nama'] ?>">
    </div>
    <br>


    <div class="col-md-3 ">
    <?php  $jk=$anggota['jk'] ?>
    <label for="jk">Jenis Kelamin</label>
    <select class="form-control" id="jk" name="jk">
      <option value="NULL" name='chosse'>---chosse---</option>
      <option <?php echo ($jk == 'Laki-Laki')? "selected":""?> >Laki-Laki</option>
      <option <?php echo ($jk == 'Perempuan')? "selected":""?> >Perempuan</option>
        

    </select>
    </div>
    <br>
    <div class="col-md-6 ">
      <label for="Alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat"><?php echo $anggota['alamat'] ?></textarea> 
    </div>
    <br>
    <div class="col-md-3 ">
      <label for="telp">Telp</label>
      <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $anggota['telp'] ?>">
    </div>
    <br>
    <div class="col-md-3 ">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $anggota['email'] ?>">
    </div>
    <br>
        <button class="btn btn-primary" type="submit" value="simpan" name="simpan">Submit</button>
    </form>
</div>
    </body>
</html>