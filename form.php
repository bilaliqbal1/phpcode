<html>
     <body>
	      <form method="post">
		         <input type="text" placeholder="Enter Your id"  name="id"  /><br/>
		       <input type="text" placeholder="Enter Your Name"  name="name"  /><br />
			   <input type="text" placeholder="Enter Your Father-Name"  name="fname" /><br />
			   <input type="text" placeholder="Enter Your Gender"  name="gender"  /><br />
			   <input type="email" placeholder="Enter Your E-mail"  name="email"  /><br />
				   <input type="number" placeholder="Enter Your Number"  name="number" /><br />
				    <input type="submit" value="Insert"  name="submit"/>
					<input type="submit" value="update" name="update"/>
					<input type="submit" value="Delete" name="delete"/>
					<input type="submit" value="Print" name="print"/>
					
					
		  </form>
		  <table border="1">
			<tr>
				<th> Id </th>
				<th> Name </th>
				<th> Father Name </th>
				<th> Gender </th>
				<th> Email </th>
				<th> Mobile Number </th>
				<th >Action </th>
			</tr>
	 </body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","career_consult");
  if(isset ($_POST ['submit'])){
	
	
		$id="";
		$name=$_POST['name'];
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$number=$_POST['number'];
		$search=$_POST['id'];
		
			$insert=mysqli_query($conn,"insert into student values('".$id."','".$name."','".$fname."','".$gender."','".$email."','".$number."');");
	if($insert)
	{
		echo "Data Inserted";
	}
	else
	{
		echo "Data could not inserted";
	}
	}
	
	 if(isset ($_POST ['update'])){
	
	
		$id=$_POST['id'];
		$name=$_POST['name'];
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$number=$_POST['number'];
		
		
			$insert=mysqli_query($conn,"update student set name='".$name."', fname='".$fname."', gender='".$gender."' , email='".$email."' , number='".$number."' where id='".$id."'");
	if($insert)
	{
		echo "Data Updated";
	}
	else
	{
		echo "Data could not Updated";
	}
	}
	
	
	 if(isset ($_POST ['delete'])){
	
	
		$id=$_POST['id'];
	
				$insert=mysqli_query($conn,"delete from student  where id='".$id."'");
	if($insert)
	{
		echo "Data Deleted";
	}
	else
	{
		echo "Data could not Deleted";
	}
	}
	if(isset ($_POST ['print'])){
	
	echo "<script> window.print();</script>";
	}
	


	
	
	$select=mysqli_query($conn,"select * from student ");
	$num=mysqli_num_rows($select);
	for($i=1; $i<=$num; $i++)
	{
		$row=mysqli_fetch_array($select);
		echo "<tr>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "<td>" . $row[5] . "</td>";
			echo "<td>" . 
							'<a href="edit.php?id='.$row[0].'">Edit</a> |
							<a href="delete.php?id='.$row[0].'">Delete</a>'

			. "</td>";
		echo "</tr>";
	}
	
	
?>