<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
		<form method="post" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<th>Id </th>
					<td><input type="text" name="txtid"></td>
				</tr>

				<tr>
					<th>Name </th>
					<td><input type="text" name="txtname"></td>
				</tr>

				<tr>
					<th>Father  Name </th>
					<td><input type="text" name="txtfname"></td>
				</tr>
				<tr>
					<th>Gender:</th>
					<td><input type="radio" name="gender" value="1">Male
						<input type="radio" name="gender" value="0">female</td>
					</tr>
				<tr>
					<th>Image </th>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" name="sub"></td>
				</tr>
				<tr>
					<th>update</th>
					<td><input type="submit" name="update" value="update"></td>
				</tr>
				<tr>
					<th>Delete</th>
					<td><input type="submit" name="delete" value="delete"></td>
				</tr>
			</table>
		</form>
		<table border="1">
			<tr>
				<th>Name:</th>
				<th>Pics</th>
			</tr>
			
</body>
</html>
<?php 

	$conn = mysqli_connect("localhost","root","","img_db");
	if(isset($_POST['sub'])){
	$id="";
	$fname=$_POST['txtfname'];
	$name=$_POST['txtname'];
	$gender=$_POST['gender'];
	$img=$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], "images/".$img);
	if(strlen($img) < 1)
	{
			if($gender == "1")
			{
				$insert = mysqli_query($conn,"insert into images values('$id','$name','$gender','male.png');");
				if ($insert) {
					echo "<script> alert('pic save');</script>";
					
				}
				else{
					echo "pic dont save";
				}
			}
			else
			{
				$insert = mysqli_query($conn,"insert into images values('$id','$name','$gender','female.png');");
					if ($insert) {
						echo "<script> alert('pic save');</script>";
					}
					else{
						echo "pic dont save";
					}
			}
	}
	else
	{
		$insert = mysqli_query($conn,"insert into images values('$id','$name','$gender','$img');");
		if ($insert) {

			echo "<script> alert('pic save');</script>";

		}
		else{
			echo "pic dont save";
		}
	}
	

}
	if (isset($_POST['delete'])) {
		# code...
		$id=$_POST['txtid'];
	$select = mysqli_query($conn,"select * from images");
	$num = mysqli_num_rows($select);
	if ($num > 0) {
		# code...
		$update = mysqli_query($conn,"delete from images where id='".$id."' ");
	}			
	}
	if (isset($_POST['update'])) {
		# code...
		$id=$_POST['txtid'];
	$img=$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], "images/".$img);
	$select = mysqli_query($conn,"select * from images");
	$num = mysqli_num_rows($select);
	if ($num > 0) {
		# code...
		$update = mysqli_query($conn,"update images set pics = '".$img."' where id='".$id."' ");
	}			
	}
	$select = mysqli_query($conn,"select * from images ORDER BY id DESC");
	$num = mysqli_num_rows($select);
	for($i=0;$i<$num;$i++){
			$fetch = mysqli_fetch_array($select);
		echo "<tr>";
		echo "<td>" . $fetch[1] . "</td>";
		echo "<td>" . '<img src="images/'.$fetch[3].'" width="50px"/>' . "</td>";
		echo "</tr>";
	}

 ?>