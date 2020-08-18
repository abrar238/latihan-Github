<div class="container">
            <h3>Register</h3>
        <form class="needs-validation" novalidate action="simpan.php" method="POST">

          <div class="col-md-3 ">
              <label for="no">No</label>
              <input type="text" class="form-control" id="no" name="no" >
            </div>
            <br>
            <div class="col-md-3 ">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <br>

            <div class="col-md-3">
            <label for="nama">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required>
              <option value="" >Choose</option>
              <option >Operator</option>
              <option >Leader</option>
              <option >Supervisor</option>
              <option >Assisten Manager</option>
              <option>Manager</option>
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
              <option>Islam</option>
              <option>Kristen</option>
              <option>Hindu</option>
              <option>Budha</option>
              <option>Konghucu</option>
            </select>
          </div>
            <br>

            <div class="col-md-6 ">
              <label for="Alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat"></textarea> 
            </div>
            <br>
            <div class="col-md-3 ">
              <label for="telp">Telp</label>
              <input type="text" class="form-control" id="telp" name="telp">
            </div>
            <br>
            <div class="col-md-3 ">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <br>
          
                <button class="btn btn-primary" type="submit" value="submit" name="submit">Submit</button>
            </form>
        </div>