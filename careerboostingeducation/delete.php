<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","career_boosting_computer_education");
$delete=mysqli_query($conn,"delete from student where id='$id'");
if($delete)
{
	echo "<script> alert('Data Deleted'); </script>";
	//echo "<script> window.location.assign('form.php'); </script>";
	header("location:form.php");
}
?>