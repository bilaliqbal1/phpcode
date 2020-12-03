<html>
	<body>
		<form method="post">
			<input type="text" placeholder="enter id" name="id" /><br/>
			<input type="text" placeholder="enter your name" name="name" required/><br/>
			<input type="text" placeholder="enter your f_name" name="f_name" required/><br/>
			<input type="age" placeholder="enter your age" name="age" required/><br/>
			<a href="insert.php"><input type="submit" value="Insert" name="submit"/></a>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		header("location:db.php");
	}
	if(isset ($_POST ['submit'])){
	
	$conn=mysqli_connect("localhost","root","","phpconnectdb");
	
	$id="";
	$name= $_POST['name'];
	$f_name= $_POST['f_name'];
	$age= $_POST['age'];
	
	$insert=mysqli_query($conn,"insert into student values('".$id."','".$name."','".$f_name."' ,'".$age."');");
	if($insert)
	{
		echo "Data Inserted";
	}
	else
	{
		echo "Data could not inserted";
	}
	}
?>
