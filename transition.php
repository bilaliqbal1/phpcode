<!DOCTYPE html>
<html>
<head>
	<title>transition</title>
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<th> Account no : </th>
					<td><input type="number" name="acnt"> </td>
			</tr>
			<tr>
				<th> amount : </th>
					<td><input type="number" name="amt"> </td>
			</tr>
			<tr>
				<th> Transition Type : </th>
					<td><select name="tran">
						<option value="0">Debit</option>
						<option value="1">Credit</option>
					</select> </td>
			</tr>
			<tr>
				<th> : </th>
					<td><input type="submit" name="btn" value="transition"></td>
					<td><input type="submit" name="btn_search" value="Search"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php 
	$conn = mysqli_connect("localhost","root","","account");
	if (isset($_POST['btn'])) {
		$id= "";
		$acnt = $_POST['acnt'];
		$amt = $_POST['amt'];
		$tran = $_POST['tran'];

		$acnt = mysqli_query($conn,"Select * from account where id='".$acnt."' ");
		$num = mysqli_num_rows($acnt);
		$fetch = mysqli_fetch_array($acnt);
		if($num > 0){
			if ($tran==1) {
				$update = mysqli_query($conn,"update accounts set ammount=ammount+'".$amt."' where id='".$acnt."' ");
				$insert = mysqli_query ($conn, "insert into transition values ('".$id."','".$acnt."','0','".$amt."');");
			}
			else {
				if($fetch[2]> $amt){
				$update = mysqli_query($conn,"update accounts set ammount=ammount-'".$amt."' where id='".$acnt."' ");
				$insert = mysqli_query ($conn, "insert into transition values ('".$id."','".$acnt."','".$amt."','0');");	
			}
			else {
				echo "your account is less than". ($amt-$fetch[2]);
			}
		}
		}
	else{
		echo "account not exist";
	}
	}

 ?>