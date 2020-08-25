<div class="container">
  <h2>Upload Gambar</h2>
  <form class="needs-validation" novalidate action="?hal=uploadgambar" method="POST" enctype="multipart/form-data"> 
<div class="col-md-3 ">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" id="nama" name="nama" required>
</div>
<br>
<div class="form-group col-md-3">
    <label for="exampleFormControlFile1">Example Image input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
    <img src="" id="profile-img-tag" width="100px"> 
    
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
      
</div>
<button class="btn btn-primary" type="submit" value="upload" name="upload">Submit</button>
</from>
</div>
<hr>


<div class="container">
<h6>Data Gambar</h6>
<table class="table table-dark table-striped">
<tr>
  <th>No</th>
  <th>Nama</th>
  <th>Gambar</th>
  <th>Size</th>
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