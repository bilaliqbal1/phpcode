<html>
<form method="post">
	<table border="1">
		<tr>
			<th> Name  : </th>
			<td> <input type="text" name="txtname" /></td>
		</tr>
		<tr>
			<th>   : </th>
			<td> <input type="Submit" name="btn_reg" value="Create Account" /></td>
		</tr>
	</table>
	</form>
</html>

<?php

$conn=mysqli_connect("localhost","root","","mydb");
if(isset($_POST['btn_reg']))
{
	$id="";
	$name=$_POST['txtname'];
	
	$insert=mysqli_query($conn,"insert into accounts values('".$id."','".$name."','0');");
	if($insert)
	{
		echo "<script> alert('Account Create Successfully'); </script>";

	}
	else
	{
	echo "<script> alert('Account not created'); </script>";
	}
	}



?>