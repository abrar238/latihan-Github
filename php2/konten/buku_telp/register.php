      <h3>Register</h3>
        <form class="needs-validation" novalidate action="?hal=simpan" method="POST">

          <div class="form-group row">
              <label for="nama" class="col-sm-1 col-form-label">Nama</label>
              <div class="col-sm-3">
              <input type="text" class="form-control" id="nama" name="nama" required style="height: 25px">
              </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="col-sm-1 col-form-label">Jabatan</label>
            <div class="col-md-3">
            <select class="form-control" id="jabatan" name="jabatan" required style="font-size: 15px">
              <option value="" >Choose</option>
              <option value="Operator" >Operator</option>
              <option value="Leader" >Leader</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Sekertaris">Sekertaris</option>
              <option value="Manager">Manager</option>
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="jk" value="jk" class="col-sm-1 col-form-label">Gender: </label><br>
            <div class="col-md-3">
            <label><input type="radio" name="jk" value="Laki-Laki"> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>
          </div>

          <div class="form-group row">
              <label for="nama" class="col-sm-1 col-form-label">Agama</label>
            <div class="col-md-3">
            <select class="form-control" id="agama" name="agama" style="font-size: 15px" required>
              <option value="" >Choose</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
            </div>
          </div>

            <div class="form-group row">
              <label for="Alamat" class="col-sm-1 col-form-label">Alamat</label>
              <div class="col-md-3">
              <textarea class="form-control" id="alamat" name="alamat" required style="width:250px"></textarea> 
            </div>
            </div>

            <div class="form-group row">
              <label for="telp" class="col-sm-1 col-form-label">Telp</label>
            <div class="col-md-3">
              <input type="text" class="form-control" id="telp" name="telp" required style="height: 25px">
            </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-1 col-form-label">Email</label>
              <div class="col-md-3">
              <input type="email" class="form-control" id="email" name="email" required style="height: 25px">
              </div>
            </div>

           <!-- <script type="text/javascript">

              $(function(){
                $("#datepicker").datepicker();
              });
            </script>

            <div class="form-gruop row">
              <label for="datepicker" class="col-sm-1 col-from-label">Tanggal</label>
              <div class="col-md-3">
              <input type="text" name="datepicker" id="datepicker" style="height: 25px" >
              </div>
            </div> -->

            <button class="btn btn-primary btn-sm" type="submit" value="submit" name="submit">Submit</button>
            </form>