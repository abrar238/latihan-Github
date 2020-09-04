<h3>Message</h3>

<form action="?hal=kirim" method="POST">

<div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Kepada</label>
    <div class="form-group col-md-3">
    <input type="email" name="email_penerima" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 25px">
	</div>
</div>

<div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Subjek</label>
    <div class="form-group col-md-3">
    <input class="form-control form-control-sm" type="text" name="subjek" style="height: 25px">
	</div>
</div>

<div class="form-group row">
    <label for="Pesan" class="col-sm-1 col-form-label">Pesan</label><br>
    <div class="form-group col-md-3">
    <textarea class="form-control" id="pesan" name="pesan" style="width:250px"></textarea>
	</div>
</div>

    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>

<button type="submit" value="submit" name="submit"class="btn btn-outline-primary btn-sm">Kirim</button>

</form>