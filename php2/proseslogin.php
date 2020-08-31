<?php
include "koneksi.php";

if (isset($_POST['login_btn'])) {
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	 $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
	 $query = mysqli_query($koneksi,$sql);
	 $cek = mysqli_fetch_array($query);

	if($cek>0){
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['status']='login';
		echo "sukses";
		header('location:homepage.php?hal=home');
	}
	else{
		echo "gagal";
		header('location:index.php');
	}
}
?>