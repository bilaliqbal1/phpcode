<html>
	<body>
		<form method="post">
			<input type="text" placeholder="enter id" name="id" /><br/>
			<input type="text" placeholder="enter your name" name="name" required/><br/>
			<input type="text" placeholder="enter your f_name" name="f_name" required/><br/>
			<input type="age" placeholder="enter your age" name="age" required/><br/>
			<input type="submit" value="update" name="update"/>
		</form>
	</body>
</html>

<?php
if(isset($_POST['submit']))
	{
		header("location:db.php");
	}
	if(isset ($_POST ['update'])){
	
	$conn=mysqli_connect("localhost","root","","phpconnectdb");
	
	$id=$_POST['id'];
	$name= $_POST['name'];
	$f_name= $_POST['f_name'];
	$age= $_POST['age'];
	
		$insert=mysqli_query($conn,"update student set name='".$name."', f_name='".$f_name."', age='".$age."' where id='".$id."'");
	if($insert)
	{
		echo "Data Updated";
		header("location:db.php");
	}
	else
	{
		echo "Data could not updated";
	}
	}
?>
