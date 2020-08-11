<?php          
if (!empty($SesNik)) {
    include "connect.php";
    include "lib/function.php";
    include "lib/dbhrs.php";
        $cek=$dbhrs->query("SELECT nm_karyawan, posisi, tgl_upload, foto from hrs_karyawan where nik='$SesNik'");
    $cek->execute();
    $view=$cek->fetch(PDO::FETCH_ASSOC);
    $halaman = isset($_GET['hal'])?$_GET['hal']:null;         
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Sistem Informasi Aset Departemen IT</title>
  <link rel="stylesheet" href="plugins/login/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/main/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/main/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/main/datatable/dataTables.bootstrap.min.css">
  <script src="plugins/login/jquery/jquery.min.js"></script>
  <script src="plugins/login/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="plugins/main/fastclick/lib/fastclick.js"></script>
  <script src="plugins/main/js/adminlte.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-lg"><b>SiASET-</b>IT</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://172.16.3.2/new/img/karyawan/<?php echo $view['foto']; ?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $view['nm_karyawan']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://172.16.3.2/new/img/karyawan/<?php echo $view['foto']; ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $view['nm_karyawan']; ?></br><?php echo $view['posisi']; ?>
                  <small><i>Terdaftar IMS Sejak <?php echo $a=date('d-M-y', strtotime($view['tgl_upload']));  ?></i></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
<?php include "menu.php";?>
<div class="content-wrapper">
      <section class="content-header">
      <h1>
        SiASET IT Departemen
        <small>Version 1.0</small>
      </h1></section>
<section class="content">
<?php
include "pageorder.php";
?>
</section>
</div>
<div class="user-footer">
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">IT Departemen</a>.</strong> All rights
    reserved.
</footer>
</div>
    <div class="control-sidebar-bg"></div>


</body>
</html>

<?php } else {
    header("location:login.php");
} 
?>
