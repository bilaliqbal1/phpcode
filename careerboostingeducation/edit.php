<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","career_boosting_computer_education");
$select=mysqli_query($conn,"select * from student where id='$id'");
$row=mysqli_fetch_array($select);
if(isset($_POST['update']))
{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$number=$_POST['number'];
		
		
			$insert=mysqli_query($conn,"update student set name='".$name."', fname='".$fname."', gender='".$gender."' , email='".$email."' , number='".$number."' where id='".$id."'");
	if($insert)
	{
		echo "<script> alert('Data Updated'); </script>";
		echo "<script> window.location.assign('form.php'); </script>";
	}
	else
	{
		echo "Data could not Updated";
	}
}
?>
<html>
     <body>
	      <form method="post">
		         <input type="text" value="<?php echo $row[0];?>" readonly  name="id"  /><br/>
		       <input type="text" value="<?php echo $row[1];?>" name="name"  /><br />
			   <input type="text" value="<?php echo $row[2];?>"  name="fname" /><br />
			   <input type="text" value="<?php echo $row[3];?>"  name="gender"  /><br />
			   <input type="email" value="<?php echo $row[4];?>"  name="email"  /><br />
				   <input type="number" value="<?php echo $row[5];?>"  name="number" /><br />
					<input type="submit" value="update" name="update"/>
					
					
		  </form>

