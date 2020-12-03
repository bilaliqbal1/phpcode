 <html>
 <body>
 	<center>
 			<img src="img.jpg" alt="bank image" width="150px" height="100px" style="margin-top : -25px; ">
 			<h2> Add Transaction</h2>
<form method="post" style="margin-top : -15px; " >
	<table border="10">
		<tr>
			<th> Account No  : </th>
			<td> <input type="text" name="account" /></td>
		</tr>
		<tr>
			<th> Amount  : </th>
			<td> <input type="text" name="txtamt" /></td>
		</tr>
		<tr>
			<th>check Date : </th>
			<td><input type="date" name="cdate"></td>
		</tr>
		<tr>
			<th>Cash Date : </th>
			<td><input type="date" name="ccdate"></td>
		</tr>
		<tr>
			<th> Transition Type  : </th>
			<td><select name="tran">
					<option value="0"> Debit </option>
					<option value="1"> Credit </option>
			</select>
			</td>
		</tr>
		<tr>
			<th>   : </th>
			<td> <input type="Submit" name="btn_reg" value="Add Transition" /></td>
			<td> <input type="submit" name="btn_search" value="search" /></td>
		</tr>
	</table>
	</form>
	
	<h2>Get Statement</h2>
	<form method="post" style="margin-top : -15px; ">
	<table border="10">
		<tr>
			<th> Account No  : </th>
			<td> <input type="text" name="txtname" /></td>
		</tr>
		<tr>
			<th> Start Date  : </th>
			<td> <input type="date" name="start_date" /></td>
		</tr>
		<tr>
			<th> End Date  : </th>
			<td> <input type="date" name="end_date" /></td>
		</tr>
		<tr>
			<th>   : </th>
			<td> <input type="Submit" name="stat" value="Generate Statement" /></td>
		</tr>
	</table>
	</form>
</center>
</body>
</html>

<?php

$conn=mysqli_connect("localhost","root","","bank_app");
if(isset($_POST['btn_reg']))
{
	$id="";
	$name=$_POST['account'];
	$amt=$_POST['txtamt'];
	$date=$_POST['cdate'];
	$cdate=$_POST['ccdate'];
	$tra=$_POST['tran'];
	$acnt=mysqli_query($conn,"Select * from accounts where id='".$name."'");
	$num=mysqli_num_rows($acnt);
	$fetch=mysqli_fetch_array($acnt);
	if($num > 0)
	{
			if($tra == 1)
			{
				$update=mysqli_query($conn,"update accounts set amount=amount+'".$amt."' where id='".$name."'");
				$insert=mysqli_query($conn,"insert into tran values('".$id."','".$name."','0','".$amt."','".$date."','0');");
			}
			else
			{
				if($fetch[2] > $amt)
				{
					$update=mysqli_query($conn,"update accounts set amount=amount-'".$amt."' where id='".$name."'");
				  $insert=mysqli_query($conn,"insert into tran values('".$id."','".$name."','".$amt."','0','".$date."','0');");
				}
				else
				{
					echo "Your Amount is less then" . ($amt-$fetch[2]) ;
				}
			}		
	}
	else
	{
		echo "Account Not Exist";
	}
	
}
	if(isset($_POST['btn_search'])){
		$id=$_POST['account'];
		$select = mysqli_query($conn,"select * from tran where account='".$id."'");
		$num = mysqli_num_rows($select);
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th> id </th>";
		echo "<th> Debit </th>";
		echo "<th> Credit </th>";
		echo "</tr>";
		for($i=1; $i<=$num ; $i++){
			$row = mysqli_fetch_array($select);
			echo "<tr>";
			echo "<td>".$row[0] . "</td>";
			echo "<td>".$row[2] . "</td>";
			echo "<td>".$row[3] . "</td>";
			echo "</tr>";
		}
		
		
	}
	# get statement start 
	if(isset($_POST['stat']))
{
	echo "Account No : " . $_POST['txtname'];
	echo "
		<table border='10'>
			<tr>
			<th> Date </th>
				<th> Debit </th>
				<th> Credit </th>
				
			</tr>
	";
	$id=$_POST['txtname'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	
	$select=mysqli_query($conn,"select * from tran where account='".$id."' AND date between '".$start_date."' AND '".$end_date."'");
	$num=mysqli_num_rows($select);
	$add=0;
	$sub=0;
	for($i=0; $i<$num; $i++)
	{
		$row=mysqli_fetch_array($select);
		$add=$add+$row[2];
		$sub=$sub+$row[3];
		echo "<tr>";
		echo "<td>" . $row[4] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			
		echo "</tr>";
	}
	echo "<tr>";
		echo "<td>" . 'Sum' . "</td>";
			echo "<td>" . $add . "</td>";
			echo "<td>" . $sub . "</td>";
			
		echo "</tr>";
	echo "<tr>";
		echo "<td>" . 'Net Amount' . "</td>";
			echo "<td colspan='2' align='center'>" . ($sub-$add) . "</td>";

		echo "</tr>";
		
		$act=mysqli_query($conn,"Select * from tran where id='$id'");
		$rec=mysqli_fetch_array($act);
		echo "<tr>";
		echo "<td>" . 'Gross Amount' . "</td>";
			echo "<td colspan='2' align='center'>" . $rec[2] . "</td>";
			
		echo "</tr>";
}
	

?>