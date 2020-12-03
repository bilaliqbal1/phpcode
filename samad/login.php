<html>
<form method="post">
	<table border="1">
		
		<tr>
			<th> Email  : </th>
			<td> <input type="text" name="txtemail" /></td>
		</tr>
		
		<tr>
			<th> Password  : </th>
			<td> <input type="text" name="txtpass" /></td>
		</tr>
		
		<tr>
			<th>   : </th>
			<td> <input type="Submit" name="btn_reg" value="Loguin" /></td>
		</tr>
	</table>
	</form>
</html>

<?php

$conn=mysqli_connect("localhost","root","","db_login");
if(isset($_POST['btn_reg']))
{
	$email=$_POST['txtemail'];
	$pass=$_POST['txtpass'];
	
	$insert=mysqli_query($conn,"Select * from tbl_login where email='".$email."' AND password='".$pass."'");
	$num=mysqli_num_rows($insert);
	if($num > 0)
	{
		echo "<script> alert('Login Successfully'); </script>";
	}
	else
	{
	echo "<script> alert('Inval;id username or password'); </script>";
	}
	}



?>