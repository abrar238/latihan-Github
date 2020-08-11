    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-body-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pengguna</span>
              <span class="info-box-number">
<?php $view=$conn->query("SELECT nik from ams_pengguna");
      $count=$view->rowCount();
 echo $count;
 ?>
                <small>Orang</small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-area-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Aset</span>
              <span class="info-box-number">
                <?php $view=$conn->query("SELECT id_aset from ams_aset");
      $count=$view->rowCount();
 echo $count;
 ?>
              </span>
            </div>
          </div>
        </div>
 
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tanda Terima</span>
              <span class="info-box-number">
                <?php $view=$conn->query("SELECT id_tterima from ams_tandaterima");
      $count=$view->rowCount();
 echo $count;
 ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Maintenance</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  <?php $viewkt=$conn->query("select * from ams_kategori");
 ?>
 <div class="col-md-12">
<?php       while ($tampil=$viewkt->fetch(PDO::FETCH_ASSOC)) {
 ?>
<div class="col-md-3">
<a href="?page=mk_aset&hal=lihat&id=<?php echo $tampil['id_kategori'];  ?>"><div class="info-box bg-blue">
  <span class="info-box-icon"><i class="fa fa-<?php echo $tampil['kd_menu']; ?>"></i></span>
  <div class="info-box-content">
    <span class="info-box-text"><?php echo $tampil['kode_kat']; echo "-"; echo $tampil['kategori']; ?></span>
    <span class="info-box-number"> Total
      <?php  
      $kt=$tampil['id_kategori'];
$dt=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt'");
$count=$dt->rowCount();
 echo $count;
      ?> Unit
    </span>
          <?php  
      $kt=$tampil['id_kategori'];
$dt0=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt' AND aset_position='2'");
$count0=$dt0->rowCount();
$dt=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt' AND aset_position='1'");
$count1=$dt->rowCount();
$dt1=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt'AND aset_status='1'");
$count2=$dt1->rowCount();
$dt2=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt' AND aset_status='3'");
$count3=$dt2->rowCount();
$dt3=$conn->query("SELECT id_aset FROM ams_aset where id_kategori='$kt' AND aset_status='2'");
$count4=$dt3->rowCount();
      ?>
        <span class="info-box-text"><?php echo $count1; ?> Unit Tersedia | <?php echo $count0; ?> On Site</span>
    <span class="progress-description">
      <?php echo $count2; ?> Standby | <?php echo $count3; ?> Service | <?php echo $count4; ?> Pengecekan
    </span>
  </div>
  <!-- /.info-box-content -->
</div></a>
</div>
<?php } ?>


</div>
