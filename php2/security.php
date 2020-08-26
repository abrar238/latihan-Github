<?php 
session_start();
if(!$_SESSION['$username' & '$password']){
	header('location: login.php'); 
}
?>