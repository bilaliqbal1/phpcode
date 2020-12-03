<!DOCTYPE html>
<html>
<head>
	<title>Banking Application</title>
</head>
<body>
	<center><img src="img.jpg" alt="bank image" width="150px" height="100px">
	<h1>Welcome To Habib Bank Limited</h1>

	<form method="post">
		<table border="10">
			<tr>
				<th>Name : </th>
				<td><input type="txt" name="txtname"></td>
			</tr>
			 <tr>
			 	<th> : </th>
				<td><input type="submit" name="btn_submit" value="Create Account"></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>
<?php 

	$conn=mysqli_connect("localhost","root","","bank_app");
	if(isset($_POST['btn_submit']))
	{
		$id="";
		$name=$_POST['txtname'];
		
		$insert=mysqli_query($conn,"insert into accounts values('".$id."','".$name."','0');");
		if($insert)
		{
			echo "<script> alert('Account Create Successfully'); </script>";
			echo "<script> window.location.assign('tran.php');</script>";
		}
		else
		{
		echo "<script> alert('Data not Save'); </script>";
		}
		}

 ?>