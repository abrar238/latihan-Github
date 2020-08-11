<?php 
include "connect.php";
$query2=$conn->prepare("SELECT * FROM ams_kategori");
$query2->execute();
$SesNik         = isset($_SESSION['Nik'])?$_SESSION['Nik']:null;
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Aset</li>
        <li class="<?php if($_GET['page']=='home') { echo 'active'; } ?>" ><a href="?page=home"><i class="fa fa-home"></i> <span>Menu Utama</span></a></li>
        <li class="<?php if($_GET['page']=='mk_aset') { echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Master Aset</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      <?php
      while ($tampil=$query2->fetch(PDO::FETCH_ASSOC)) { ?>
                <li><a href="?page=mk_aset&hal=lihat&id=<?php echo $tampil['id_kategori'];  ?>"><i class="fa fa-<?php echo $tampil[kd_menu]; ?>"></i><?php echo $tampil['kode_kat']; ?> - <?php echo $tampil['kategori']; ?></a></li>
      <?php } ?>
            </ul>
        </li>
<?php 
$cek=$conn->query("SELECT nik_aks, nm_modul, nm_menu, icon_menu FROM ams_akses INNER JOIN ams_menu ON ams_akses.id_menu=ams_menu.id_mn where ams_akses.nik_aks='$SesNik' && ams_menu.list_data='1'");
$cek->execute();
 while ($views=$cek->fetch(PDO::FETCH_ASSOC)) { ?>
      <li class="<?php if($_GET['page']==$views['nm_modul']) { echo 'active'; } ?>" ><a href="?page=<?php echo $views['nm_modul']; ?>&hal=lihat"><i class="fa <?php echo $views['icon_menu']; ?>"></i> <span><?php echo $views['nm_menu']; ?></span></a></li>
<?php } ?>
<li class="header">Menu Layanan</li>
<?php
$ceks=$conn->query("SELECT nik_aks, nm_modul, nm_menu, icon_menu FROM ams_akses INNER JOIN ams_menu ON ams_akses.id_menu=ams_menu.id_mn where ams_akses.nik_aks='$SesNik' && ams_menu.list_data='3'");
while ($views=$ceks->fetch(PDO::FETCH_ASSOC)) { ?>
      <li class="<?php if($_GET['page']==$views['nm_modul']) { echo 'active'; } ?>" ><a href="?page=<?php echo $views['nm_modul']; ?>&hal=lihat"><i class="fa <?php echo $views['icon_menu']; ?>"></i> <span><?php echo $views['nm_menu']; ?></span></a></li>
<?php } ?>
<li class="header">Menu Administrator</li>
<?php 
$cek=$conn->query("SELECT nik_aks, nm_modul, nm_menu, icon_menu FROM ams_akses INNER JOIN ams_menu ON ams_akses.id_menu=ams_menu.id_mn where ams_akses.nik_aks='$SesNik' && ams_menu.list_data='2'");
$cek->execute();
 while ($views=$cek->fetch(PDO::FETCH_ASSOC)) { ?>
      <li class="<?php if($_GET['page']==$views['nm_modul']) { echo 'active'; } ?>" ><a href="?page=<?php echo $views['nm_modul']; ?>&hal=lihat"><i class="fa <?php echo $views['icon_menu']; ?>"></i> <span><?php echo $views['nm_menu']; ?></span></a></li>
<?php } ?> 
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
