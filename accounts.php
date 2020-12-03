<!DOCTYPE html>
<html>
<head>
	<title>accounts</title>
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<th> Name : </th>
					<td><input type="name" name="txtname"> </td>
			</tr>
			<tr>
				<th> : </th>
					<td><input type="submit" name="btn" value="create account"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
		$conn =  mysqli_connect("localhost", "root","","account");
		if (isset($_POST['btn'])) {
			$id ="";
			$name = $_POST['txtname'];

			$insert = mysqli_query($conn,"insert into accounts values ('".$id."','".$name."')");
			if ($insert) {
				echo "<script> alert('Account Created');</script>";
			}
			else{
				echo "<script> alert('Account not Created');</script>";	
			}
		}
 ?>