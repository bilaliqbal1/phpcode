<?php
	session_start();
	isset($_SESSION['email']) or die  (header("location: login.php"));
	$email = $_SESSION ['email'];
	$conn = mysqli_connect("localhost","root","","registration");
	$abc = mysqli_query($conn,"select * from reg_tbl where email = '$email'");
	$fetch= mysqli_fetch_array($abc);
	echo	"Welcome to my website:". $fetch[1] ;
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:login.php");
	}

?>
<html>
<form method="post">
	<input	type="submit" value ="logout" name="logout">	
</form>
</html>