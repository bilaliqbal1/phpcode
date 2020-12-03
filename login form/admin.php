<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> Welcome to Admin Page </h1>
	<form method="post">
		<table border="1">
				<tr>
					<th>Name : </th>
					<td><input type="text" name="txtname">
				</tr>
			<tr>	
				<th>Email: </th>
				<td><input type="email" name="txtemail"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" value="Create account" name="btn"></td>
			</tr>
		</table>
		<button name="log">Logout </button>
	</form>
</body>
</html>
<?php 
	$conn=mysqli_connect("localhost","root","","mini_pro");
		session_start();
		$admin = $_SESSION['email'];
	if (isset($_POST['btn'])) {
		$id ="";
		$name=$_POST['txtname'];
		$email=$_POST['txtemail'];
		$pass=$_POST['pass'];
		$insert = mysqli_query($conn, "insert into branch values('$id','$name','$email','$pass')");
		if($insert){
			echo "<script> alert('Add');</script>";
		}
		
	}
	if(isset($_POST['log'])){
		session_destroy();
		echo "<script> window.location.assign('index.php');</script>";		
	}
 ?>		