<?php 
if(isset($_POST['id'])){
$connect=new PDO('mysql:host=localhost;dbname=latihan','root','');
	$query="DELETE FROM event WHERE id=:id";
	$statement=$connect->prepare($query);
	$statement->execute(
		array(
		 ':id'=>$_POST['id']
		)
	);
}
 ?>