  <h3>Anggota</h3>
  <h5><a href="?hal=register" class="btn btn-primary btn-sm">[+] anggota baru</a></h5>
   <table class="table table-dark table-striped table-sm">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Gender</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
   </thead>

      <?php
      $sql="SELECT*FROM register";
      $query= mysqli_query($koneksi, $sql);
      while ($anggota=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>".$anggota['no']."</td>";
        echo "<td>".$anggota['nama']."</td>";
        echo "<td>".$anggota['jabatan']."</td>";
        echo "<td>".$anggota['jk']."</td>";
        echo "<td>".$anggota['agama']."</td>";
        echo "<td>".$anggota['alamat']."</td>";
        echo "<td>".$anggota['telp']."</td>";
        echo "<td>".$anggota['email']."</td>";
        echo "<td>";
        echo "<a class='btn btn-info btn-sm' href='?hal=edit&no=".$anggota['no']."'>edit</a>";
        echo "<a class='btn btn-danger btn-sm' href='?hal=delete&no=".$anggota['no']."'>delete</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
   </table>
      <div class="container">
        <h6>Total Anggota: <?php echo mysqli_num_rows($query) ?></h6>
      </div>
      <div class="btn-toolbar mb-3 btn-sm" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2 btn-sm" role="group" aria-label="First group">
          <button type="button" class="btn btn-secondary">1</button>
          <button type="button" class="btn btn-secondary">2</button>
          <button type="button" class="btn btn-secondary">3</button>
          <button type="button" class="btn btn-secondary">Next</button>
      </div>
      </div>
