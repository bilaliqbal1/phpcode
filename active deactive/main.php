
<?php 
	$conn = mysqli_connect("localhost","root","","bank_app");
	$select = mysqli_query($conn,"select * from tran ");
	$num = mysqli_num_rows($select);
	echo "<table border='1'>";
	echo "<tr>". 
	'<th> Account </th>'.
	'<th> Debit </th>'.
	'<th> Credit </th>'.
	'<th> Date </th>'.
	'<th> Status </th>'.
	'<th> Action </th>'
	.'</tr>';

	for($i=1;$i<=$num;$i++){
		$row = mysqli_fetch_array($select);
		echo "<tr>";
		echo "<td>". $i."</td>";
			echo "<td>". $row[1]."</td>";
			echo "<td>". $row[2]."</td>";
			echo "<td>". $row[3]."</td>";
			echo "<td>". $row[4]."</td>";
			if ($row[5] == 0) {
				echo "<td>".'<a href="delete.php?id='.$row[0].'">Delete</a>'."</td>";
			}
			else {
				echo "<td>".'<a href="recover.php?id='.$row[0].'">Recover</a>'."</td>";
			}
			echo "</tr>";
	}
 ?>