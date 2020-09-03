<h3>Message</h3>

<form action="?hal=kirim" method="POST">
<div class="form-group col-md-3">
    <label for="exampleInputEmail1">Email Penerima</label>
    <input type="email" name="email_penerima" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="form-group col-md-3">
    <label for="exampleInputEmail1">Subjek</label>
    <input class="form-control form-control-sm" type="text" name="subjek">
</div>
<div class="form-group col-md-3">
    <label for="Pesan">Pesan</label><br>
    <textarea class="form-control" id="pesan" name="pesan" style="width:220px"></textarea>
</div>
<div class="form-group col-md-3">
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
</div>
<button type="submit" value="submit" name="submit"class="btn btn-outline-primary btn-sm">Kirim</button>
</form>