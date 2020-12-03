<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> Welcome to Branch Page </h1>
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
				<td ><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Create account" name="btn"></td>
			</tr>
			</table>
			<button name="log"> Logout </button>
		</form>
</body>
</html>	
<?php 
	$conn=mysqli_connect("localhost","root","","mini_pro");
		session_start();
		$admin=$_SESSION['email'];
		$sel = mysqli_query($conn,"select * from branch where email='$admin'");
		$fetch = mysqli_fetch_array($sel);
		$b_id=$fetch[0];
		echo "<br/>Branch name is : " . $fetch[1];
	if (isset($_POST['btn'])) {
		$id ="";
		$name=$_POST['txtname'];
		$email=$_POST['txtemail'];
		$pass=$_POST['pass'];
		$insert = mysqli_query($conn, "insert into brocher values('$id','$name','$email','$pass',$b_id)");
		if($insert){
			echo "<script> alert('Add'); </script>";
		}
	}
	$name = mysqli_query($conn,"select * from brocher where branch='$b_id'"); 
	$num = mysqli_num_rows($name);
		echo "<table border='1'>".
		'<tr>'.
		'<th> Name: </th>'.
		'<th> Email: </th>';
	for($i=0;$i<$num;$i++){
		$row = mysqli_fetch_array($name);
				
		echo "<tr>";
		echo "<td>" . $row[1] . "</td>";
		echo "<td>" . $row[2] . "</td>";
		echo "</tr>";
 	}
	echo "</table>";
	if(isset($_POST['log'])){
		session_destroy();
		echo "<script> window.location.assign('index.php');</script>";		
	}
 ?>		