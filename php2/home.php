<?php
if ($_GET['hal']=="home") {
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Dashbord</h3>
  <div class="row">
    <div class="col-sm">
		  <div class="card text-white bg-info mb-3" style="width: 12rem;">
		    <div class="card-header">Info</div>
		    <div class="card-body">
		      <p class="card-text">Some quick example text to build on the card title.</p>
		  </div>
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Simple collapsible
			</button>
			<div id="demo1" class="collapse">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div>
    </div>
	</div>
    <div class="col-sm">
      	<div class="card text-white bg-success mb-3" style="width: 12rem;">
		  <div class="card-header">Succes</div>
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title.</p>
		  </div>
		  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo2">Simple collapsible
			</button>
			<div id="demo2" class="collapse">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div>
		</div>
    </div>
    <div class="col-sm">
      <div class="card text-white bg-warning mb-3" style="width: 12rem;">
	    <div class="card-header">Warning</div>
	    <div class="card-body">
	      <p class="card-text">Some quick example text to build on the card title.</p>
	  </div>
	  		<button type="button" class="btn btn-warning text-white" data-toggle="collapse" data-target="#demo4">Simple collapsible
			</button>
			<div id="demo4" class="collapse">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div>
    </div>
	</div>
     <div class="col-sm">
      <div class="card text-white bg-danger mb-3" style="width: 12rem;">
	    <div class="card-header">Danger</div>
	    <div class="card-body">
	      <p class="card-text">Some quick example text to build on the card title.</p>
	  </div>
	 	    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo3">Simple collapsible
			</button>
			<div id="demo3" class="collapse">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div>
	</div>
    </div>
  </div>

  <div class="row">
    <div class="col">      
    	<div class="card" style="width: 24rem;">
    	  <div class="card-header">Bar Chart</div>
		  <img src="img/bc.png" class="card-img-top" alt="bar chart">
		</div>
    </div>
    <div class="col">   
    	 <div class="card" style="width: 24rem;">
    	  <div class="card-header">Pie CHart</div>
		  <img src="img/pc.png" class="card-img-top" alt="pie chart">
		</div>
    </div>
  </div>
</body>
</html>


<?php
} elseif ($_GET['hal']=="kontak") {
	include "konten/buku_telp/detail.php";
}elseif ($_GET['hal']=="register") {
	include "konten/buku_telp/register.php";
}elseif ($_GET['hal']=="edit") {
	include "konten/buku_telp/fedit.php";
}elseif ($_GET['hal']=="delete") {
	include "konten/buku_telp/delete.php";
}elseif ($_GET['hal']=="simpan") {
	include "konten/buku_telp/simpan.php";
}elseif ($_GET['hal']=="ubah") {
	include "konten/buku_telp/edit.php";
}
elseif ($_GET['hal']=="upload") {
	include "konten/buku_telp/upload.php";
}
elseif ($_GET['hal']=="uploadfile") {
	include "konten/buku_telp/uploadfile.php";
}
elseif ($_GET['hal']=="deletefile") {
	include "konten/buku_telp/deletefile.php";
}
elseif ($_GET['hal']=="view") {
	include "konten/buku_telp/view.php";
}
elseif ($_GET['hal']=="gambar") {
	include "konten/buku_telp/uploadgambar.php";
}
elseif ($_GET['hal']=="uploadgambar") {
	include "konten/buku_telp/uploadfilegambar.php";
}
elseif ($_GET['hal']=="hapusgambar") {
	include "konten/buku_telp/hapusgambar.php";
}
 else {
	"Bukan Home";
}
?>