<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

 $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
 $query = mysqli_query($koneksi,$sql);
 $row = mysqli_fetch_array($query);
 if ($row['username'] == $username AND $row['password'] == $password) {
 	session_start();
 	$_SESSION['username'] = $username;
 	header("location:index.php");
 	}
 	else {
 		header("location:login.php");
 		 }
 ?>