<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<th>Name: </th>
				<td><input type="text" name="txtname"></td>
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
				<td><input type="submit" value="Register" name="btn_reg"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	$conn=mysqli_connect("localhost","root","","registration");
	if (isset($_POST['btn_reg'])) {
		$id ="";
		$name=$_POST['txtname'];
		$email=$_POST['txtemail'];
		$pass=$_POST['pass'];
	

			$select=mysqli_query($conn,"Select * from reg_tbl where email='".$email."'");
			$num=mysqli_num_rows($select);
			if($num > 0)
			{
				echo "<script> alert('Email already Exist'); </script>";
			}
			else
			{
		$insert = mysqli_query($conn,"insert into reg_tbl values ('".$id."','".$name."','".$email."','".$pass."')");
		if ($insert) {
			# code...
			echo "<script>alert('Data Save');</script>";
			echo "<script> window.location.assign('login.php'); </script>";		
		}
		else{
			echo "<script>alert('Data not Save');</script>";
		}
	}
 }
 ?>
