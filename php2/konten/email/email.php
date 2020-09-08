    <br>
    <h3>Kirim Email</h3>
    <hr>

    <form method="post" action="?hal=kirim" enctype="multipart/form-data">
        <div class="form-group row">
            <label  class="col-sm-1 col-form-label">Kepada</label>
            <div class="col-md-3">
            <input class="form-control" type="email" name="email_penerima" style="height: 25px"/>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-1 col-form-label">Subjek</label>
            <div class="col-md-3">
            <input class="form-control" type="text" name="subjek" style="height: 25px"/>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-1 col-form-label">Pesan</label>
            <div class="col-md-3">
            <textarea class="form-control" name="pesan" style="width: 200px"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-1 col-form-label">Attachment</label>
            <div class="col-md-3">
            <input class="form-control btn-sm" type="file" name="attachment"/>
            </div>
        </div>
        <hr>

        <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
    </form>

