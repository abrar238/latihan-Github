<div class="container">
  <h2>Upload File</h2>
  <form class="needs-validation" novalidate action="?hal=uploadfile" method="POST" enctype="multipart/form-data">


<div class="col-md-3 ">
  <label for="nama">Judul</label>
  <input type="text" class="form-control" id="judul" name="judul" required>
</div>
<br>
<div class="form-group col-md-3">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="nama_file">
</div>
    <button class="btn btn-primary" type="submit" value="upload" name="upload">Submit</button>
<hr>
</from>
</div>

<div class="container">
  <h5>Data Upload File</h5>
   <table class="table table-dark table-striped">
    <thead>
        <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Action</th>
        </tr>
   </thead>

      <?php
      $sql="SELECT*FROM upload";
      $query= mysqli_query($koneksi, $sql);
      while ($file=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>".$file['id']."</td>";
        echo "<td>".$file['judul']."</td>";
        echo "<td>";
        echo "<a class='btn btn-info' href='?hal=view&no=".$file['id']."'>view</a>";
        //echo "<a class='btn btn-danger' href='?hal=deletefile&no=".$file['id']."'>delete</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
   </table>

      <div class="container">
        <h6>Total File: <?php echo mysqli_num_rows($query) ?></h6>
      </div>
  </div>
