  <h3>Upload Gambar</h3>
  <form class="needs-validation" novalidate action="?hal=uploadgambar" method="POST" enctype="multipart/form-data"> 

<div class="form-group row">
  <label for="nama">Nama</label>
  <div class="col-md-3 ">
  <input type="text" class="form-control" id="nama" name="nama" required style="height: 25px">
  </div>
</div>

<div class="form-group row">
    <div class="form-group col-md-3">
    <input type="file" class="form-control-file-sm" id="exampleFormControlFile1" name="gambar">
    </div>
</div>  
      <script>
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function (e) {
                      $('#profile-img-tag').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }
          $("#exampleFormControlFile1").change(function(){
              readURL(this);
          });
      </script>
<button class="btn btn-primary btn-sm" type="submit" value="upload" name="upload">Submit</button>
<hr>
</from>



<div class="container">
<h5>Data Gambar</h5>
<table class="table table-dark table-striped table-sm">
<tr>
  <th style="width: 30px">No</th>
  <th style="width: 150px">Nama</th>
  <th style="width: 150px">Gambar</th>
  <th >Size</th>
  <!--<th>Action</th>-->
</tr>

    <?php
      $sql="SELECT*FROM upgambar";
      $query= mysqli_query($koneksi, $sql);
      while ($gambar=mysqli_fetch_array($query)) {
    ?> 
    <tr>
      <td><?php echo $gambar['idg'] ?></td>
      <td><?php echo $gambar['nama'] ?></td>
      <td><img src="konten/buku_telp/image/<?php echo $gambar['gambar'] ?>" width="100px"></td>
      <td><?php echo $gambar['ukuran_gambar'] ?></td>
      <!--<td><a class="btn btn-danger"  href="?hal=hapusgambar&no=<?php echo $gambar['gambar']; ?>">Hapus</a></td>-->
    </tr>
     <?php } ?>

 </table>

      <div class="container">
        <h6>Total File: <?php echo mysqli_num_rows($query) ?></h6>
      </div>

</div>