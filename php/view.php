<?php
 include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <a class="navbar-brand " href="#">
    <img class="rounded-circle" src="img/lg.jpg " alt="logo" style="width:40px;">
  </a>
  

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbardrop">
        Home
      </a>
      </li>
      <li class="nav-item dropdown">
     <a class="nav-link" href="#" id="navbardrop">
        Member
      </a>
      </li>
      <li class="nav-item dropdown">
     <a class="nav-link" href="#" id="navbardrop">
        Register
      </a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        About
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Setting
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
      </div>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
  <h2>Dark Striped Table</h2>
  <h5><a href="register1.php">[+] anggota baru</a></h5>

  <table class="table table-dark table-striped" >
  	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
      <th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Telp</th>
      <th>Email</th>
		</tr>
	</thead>

		<?php
		$sql="SELECT*FROM register";
		$query= mysqli_query($koneksi, $sql);
		while ($anggota=mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<td>".$anggota['no']."</td>";
			echo "<td>".$anggota['nama']."</td>";
      echo "<td>".$anggota['jk']."</td>";
			echo "<td>".$anggota['alamat']."</td>";
			echo "<td>".$anggota['telp']."</td>";
      echo "<td>".$anggota['email']."</td>";
			echo "<td>";
			echo "<a href='form_edit.php? no=".$anggota['no']."'>edit</a>|" ; 
			echo "<a href='delete.php? no=".$anggota['no']."'>delete</a>";
			echo "</td>";
			echo "</tr>";
		}
		?>

	</table>
</div>
</body>
</html>
