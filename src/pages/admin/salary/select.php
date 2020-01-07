<?php 
 include("condb.php");
 
	$mem_id =$_REQUEST["mem_id"];
	
 	$sql2= "SELECT * FROM  generate WHERE mem_id = '$mem_id' "; 
	
 	$result2 = mysqli_query($conn, $sql2); 
	
	while($row2 = mysqli_fetch_array($result2)) { 
	
	echo"<option value='$row2[0]'>" .$row2["generate_amount"]." </option>";
	}
 ?>