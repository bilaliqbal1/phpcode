<html>
	<body>
		<form method="post">
			<h1> Welcome to Carrer boosting school </h1>
		<input type="submit" value="Insert" name="submit"/>
			<a href="update.php"><input type="submit" value="Update" name="update"/></a>
			<a href="delete.php"><input type="submit" value="Delete" name="delete"/></a>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		header("location:insert.php");
	}
	if(isset($_POST['update']))
	{
		header("location:update.php");
	}
	if(isset($_POST['delete']))
	{
		header("location:delete.php");
	}
/*
	if(isset ($_POST ['submit'])){
	/*
	$conn=mysqli_connect("localhost","root","","phpconnectdb");
	/*
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
	else if(isset ($_POST ['update'])){
	
	$conn=mysqli_connect("localhost","root","","phpconnectdb");

	$id=$_POST['id'];
	$name= $_POST['name'];
	$f_name= $_POST['f_name'];
	$age= $_POST['age'];
	
	$insert=mysqli_query($conn,"update student set name='".$name."', f_name='".$f_name."', age='".$age."' where id='".$id."'");
	if($insert)
	{
		echo "Data Updated";
	}
	else
	{
		echo "Data could not inserted";
	}
	}
	else if(isset ($_POST ['delete'])){
	
	$conn=mysqli_connect("localhost","root","","phpconnectdb");

	$id=$_POST['id'];
	
	$insert=mysqli_query($conn,"delete from student  where id='".$id."'");
	if($insert)
	{
		echo "Data Deleted";
	}
	else
	{
		echo "Data could not inserted";
	}
	}*/
?>
