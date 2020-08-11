<?php 
$page=$_GET['page'];
$hal=$_GET['hal'];
if ($page=="mk_bukutelp" && $hal=="lihat") {
$data1=$conn->prepare("SELECT * FROM ams_kontak");
$data1->execute();
$no=1;
 ?>          
 <script type="text/javascript">
  $(function () {
    $('#table1').DataTable()
  })
</script>
          <div class="box">
            <div class="box-header">
              <h4 class="box-title"> Kontak Receptionist <a href="?page=rs_bukutelp&hal=buat&id=<?php echo $id; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah Kontak Baru</button></a></h4>
            </div>
            <div class="box-body">
            <table id="table1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <td>No</td>
                <td>Nama Kontak</td>
                <td>Kontak 1</td>
                <td>Kontak 2</td>
                <td>Fax</td>
                <td>Pilihan</td>
              </tr>
              </thead>
              <tbody>
<?php
while ($lihat = $data1->fetch(PDO::FETCH_NUM)) { ?>                            
              <tr>
        <td width="5%"><?php echo $no; $no++; ?> </td>
        <td><?php echo $lihat['1']; ?></td>
        <td><?php echo $lihat['4']; ?></td>
        <td><?php echo $lihat['5']; ?></td>
        <td><?php echo $lihat['3']; ?></td>
        <td width="10%">
            <a href="?page=ms_aset&hal=ubah&id=<?php echo $lihat['0']; ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button></a>
            <a href="?page=rs_bukutelp&hal=ubah&id=<?php echo $lihat['0']; ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
            <a href="?page=rs_bukutelp&hal=hapus&id=<?php echo $lihat['0']; ?>"  onclick="return confirm('Anda yakin ingin menghapus Kontak <?php echo $lihat[1];  ?>')"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
        </td>
<?php  } ?>     
              </tr> 
              </tbody>
            </table>
            </div>
        </div>

<?php } elseif ($page=="rs_bukutelp" && $hal=="buat") {  ?>
   <div class="box">
            <div class="box-header">
              <h4 class="box-title">Tambah Kontak Baru</h4>
            </div>
             <div class="box box-primary">
            <form action="?page=rs_bukutelp&hal=simpan" method="POST">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label>Nama Kontak / Perusahaan</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kontak">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Alamat Kontak</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat Kontak">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 1</label>
                  <input type="text" name="k1" class="form-control" placeholder="Kontak 1">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 2</label>
                  <input type="text" name="k2" class="form-control" placeholder="Kontak 2">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Fax</label>
                  <input type="text" name="fax" class="form-control" placeholder="Fax">
                </div>  
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 3</label>
                  <input type="text" name="k3" class="form-control" placeholder="Kontak 3">
                </div>  
                  <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 4</label>
                  <input type="text" name="k4" class="form-control" placeholder="Kontak 4">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 5</label>
                  <input type="text" name="k5" class="form-control" placeholder="Kontak 5">
                </div>            
              </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Simpan</button>&nbsp;<a href="javascript:history.back()"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Kembali</button></a>
              </div>
            </form>
        </div>
    </div>
<?php }  elseif ($page=="rs_bukutelp" && $hal=="ubah") { 
$id=$_GET['id'];
$update=$conn->prepare("SELECT * FROM ams_kontak where id_kontak=$id");
$update->execute();
$lihat = $update->fetch(PDO::FETCH_ASSOC);
	?> 
 <div class="box">
            <div class="box-header">
              <h4 class="box-title">Ubah Kontak</h4>
            </div>
             <div class="box box-primary">
            <form action="?page=rs_bukutelp&hal=simpanupd" method="POST">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label>Nama Kontak / Perusahaan</label>
                  <input type="text" name="nama" value="<?php echo $lihat['nm_kontak'];?>"class="form-control" placeholder="Masukkan Nama Kontak">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Alamat Kontak</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat Kontak">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 1</label>
                  <input type="text" name="k1" class="form-control" placeholder="Kontak 1">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 2</label>
                  <input type="text" name="k2" class="form-control" placeholder="Kontak 2">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Fax</label>
                  <input type="text" name="fax" class="form-control" placeholder="Fax">
                </div>  
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 3</label>
                  <input type="text" name="k3" class="form-control" placeholder="Kontak 3">
                </div>  
                  <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Kontak 4</label>
                  <input type="text" name="k4" class="form-control" placeholder="Kontak 4">
                </div>
</div>
<input type="submit" name="ubah" value="ubah">
</form>
</div>
</div>
<?php } ?> 
  