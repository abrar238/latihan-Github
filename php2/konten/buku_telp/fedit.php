<?php
if(!isset($_GET['no']) ){
    header('location:?hal=kontak');
}
$no = $_GET['no'];


$sql = "SELECT * FROM register WHERE no=$no";
$query = mysqli_query($koneksi, $sql);
$anggota = mysqli_fetch_assoc($query);


if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>


         <h3>Edit Data Anggota</h3>
         <h5><a href="?hal=kontak" class="btn btn-primary btn-sm">[kembali ke home]</a></h5>
        <form class="needs-validation" novalidate action="?hal=ubah" method="POST">

      <div class="col-md-3 ">
          <input type="hidden" class="form-control" id="no" name="no" value="<?php echo $anggota['no'] ?>" >
        </div>
        <br>
        <div class="col-md-3 ">
          <label for="nama">Nama</label><br>
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota['nama'] ?>" style="height: 30px">
        </div>
        <br>
        <div class="col-md-3 ">
        <?php  $jabatan=$anggota['jabatan'] ?>
        <label for="jabatan">Jabatan</label><br>
        <select class="form-control-sm" id="jabatan" name="jabatan">
          <option value="NULL" name='chosse'>---chosse---</option>
          <option <?php echo ($jabatan == 'Operator')? "selected":""?> >Operator</option>
          <option <?php echo ($jabatan == 'Leader')? "selected":""?> >Leader</option>
          <option <?php echo ($jabatan == 'Supervisor')? "selected":""?> >Supervisor</option>
          <option <?php echo ($jabatan == 'Sekertaris')? "selected":""?> >Sekertaris</option>
          <option <?php echo ($jabatan == 'Manager')? "selected":""?> >Manager</option>
        </select>
        </div><br>
        <div class="col-md-3 ">
        <label for="jk">Gender: </label><br>
        <?php $jk = $anggota['jk']; ?>
        <label><input type="radio" name="jk" value="Laki-Laki" <?php echo ($jk == 'Laki-Laki') ? "checked": "" ?>> Laki-laki</label>
        <label><input type="radio" name="jk" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
        </div> 
        <br>
        <div class="col-md-3 ">
        <?php  $agama=$anggota['agama'] ?>
        <label for="agama">Agama</label><br>
        <select class="form-control-sm" id="agama" name="agama">
          <option value="NULL" name='chosse'>---chosse---</option>
          <option <?php echo ($agama == 'Islam')? "selected":""?> >Islam</option>
          <option <?php echo ($agama == 'Kristen')? "selected":""?> >Kristen</option>
          <option <?php echo ($agama == 'Hindu')? "selected":""?> >Hindu</option>
          <option <?php echo ($agama == 'Budha')? "selected":""?> >Budha</option>
          <option <?php echo ($agama == 'Konghucu')? "selected":""?> >Konghucu</option>
        </select>
        </div>
        <br>
        <div class="col-md-6 ">
          <label for="Alamat">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" style="width:188px"><?php echo $anggota['alamat'] ?></textarea> 
        </div>
        <br>
        <div class="col-md-3 ">
          <label for="telp">Telp</label><br>
          <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $anggota['telp'] ?>" style="height: 30px">
        </div>
        <br>
        <div class="col-md-3 ">
          <label for="email">Email</label><br>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $anggota['email'] ?>" style="height: 30px">
        </div>
        <br>
            <button class="btn btn-primary" type="submit" value="simpan" name="simpan">Submit</button>
        </form>
 