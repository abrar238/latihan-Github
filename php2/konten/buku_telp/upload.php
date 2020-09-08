  <br>
  <h3>Upload File</h3>
  <hr>
  <form class="needs-validation" novalidate action="?hal=uploadfile" method="POST" enctype="multipart/form-data">

<div class="form-group row">
  <label for="nama">Judul</label><br>
  <div class="col-md-3">
  <input type="text" class="form-control" id="judul" name="judul" required style="height: 25px">
  </div>
</div>

<div class="form-group row">
    <div class="form-group col-md-3">
    <input type="file" class="form-control-file-sm" id="exampleFormControlFile1" name="nama_file">
    </div>
</div>
    <button class="btn btn-primary btn-sm" type="submit" value="upload" name="upload">Submit</button>
<hr>
</from>

<div class="container">
  <h5>Data Upload File</h5>
   <table class="table table-dark table-striped table-sm" style="height:100px">
    <thead>
        <tr>
        <th style="width: 30px">No</th>
        <th style="width: 180px">Judul</th>
        <th >Action</th>
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
        echo "<a class='btn btn-info btn-sm' href='?hal=view&no=".$file['id']."'>view</a>";
        //echo "<a class='btn btn-danger' href='?hal=deletefile&no=".$file['id']."'>delete</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
   </table>
        <h6>Total File: <?php echo mysqli_num_rows($query) ?></h6>


