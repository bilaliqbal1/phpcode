<?php 
	$id= $_GET['id'];
	$conn = mysqli_connect("localhost","root","","bank_app");
	$update = mysqli_query($conn,"update tran set status ='1' where id ='$id'");
	if ($update) {
		# code...
		echo "<script> alert('Data deleted succesfully');</script>";
		echo "<script> window.location.assign('main.php');</script>";
	}
 ?>