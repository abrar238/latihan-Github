<div class="container">
            <h3>Register</h3>
        <form class="needs-validation" novalidate action="?hal=simpan" method="POST">

            <br>
            <div class="col-md-3 ">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <br>

            <div class="col-md-3">
            <label for="nama">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required>
              <option value="" >Choose</option>
              <option value="Operator" >Operator</option>
              <option value="Leader" >Leader</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Sekertaris">Sekertaris</option>
              <option value="Manager">Manager</option>
            </select>
            </div>
            <br>
            <div class="col-md-3">
            <label for="jk" value="jk" >Jenis Kelamin: </label><br>
            <label><input type="radio" name="jk" value="Laki-Laki"> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>
            <br>
            <div class="col-md-3">
              <label for="nama">Agama</label>
            <select class="form-control" id="agama" name="agama" required>
              <option value="" >Choose</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>
            <br>

            <div class="col-md-6 ">
              <label for="Alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" required></textarea> 
            </div>
            <br>
            <div class="col-md-3 ">
              <label for="telp">Telp</label>
              <input type="text" class="form-control" id="telp" name="telp" required>
            </div>
            <br>
            <div class="col-md-3 ">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <br>
          
                <button class="btn btn-primary" type="submit" value="submit" name="submit">Submit</button>
            </form>
        </div>