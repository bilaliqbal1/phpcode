<html>
	<body>
		<form method="post">
			<input type="text" placeholder="enter id" name="id" /><br/>
			<input type="submit" value="Delete" name="delete"/>
		</form>
	</body>
</html>

<?php
	
	
	if(isset ($_POST ['delete'])){
	
	$conn=mysqli_connect("localhost","root","","phpconnectdb");

	$id=$_POST['id'];
	
	$insert=mysqli_query($conn,"delete from student  where id='".$id."'");
	if($insert)
	{
		echo "Data Deleted";
		header("location:db.php");
	}
	else
	{
		echo "Data could not deleted";
	}
	
	}
?>
