<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<table border="1">
				<th>Email: </th>
				<td><input type="email" name="txtemail"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" value="Login" name="btn_reg"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	$conn=mysqli_connect("localhost","root","","mini_pro");
	if (isset($_POST['btn_reg'])) {
		$id ="";
		$email=$_POST['txtemail'];
		$pass=$_POST['pass'];
		
		$admin = mysqli_query($conn,"select * from admin where email='$email' AND password ='$pass'");
		$admin=mysqli_num_rows($admin);
		
		$bra = mysqli_query($conn,"select * from branch where email='$email' AND password ='$pass'");
		$bra=mysqli_num_rows($bra);
		
		$bro = mysqli_query($conn,"select * from brocher where email='$email' AND password ='$pass'");
		$bro=mysqli_num_rows($bro);
		
		session_start();
		if ( $admin > 0) {
			#$row=mysqli_fetch_array($insert);
			#$name=$row[1];
			# code...
			#echo "<script> window.location.assign('dashboard.php');</script>";
			
			$_SESSION['email']= $email;
			header("location:admin.php");
		}
		else if ( $bra > 0) {
			#$row=mysqli_fetch_array($insert);
			#$name=$row[1];
			# code...
			#echo "<script> window.location.assign('dashboard.php');</script>";
			$_SESSION['email']= $email;
			header("location:branch.php");
		}
		else if ( $bro > 0) {
			#$row=mysqli_fetch_array($insert);
			#$name=$row[1];
			# code...	
			#echo "<script> window.location.assign('dashboard.php');</script>";
			$_SESSION['email']= $email;
			header("location:brocher.php");
		}
		else{
			echo "<script>alert('Invalid email and password');</script>";
		}
	} 
 ?>