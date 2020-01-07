<?php
include('../../../libs/db.php');
echo "\n";

$g_date = $_REQUEST['generate_date'];
$M_id = $_REQUEST['mem_id'];
$g_qty= $_REQUEST['generate_qty'];

//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO generate (generate_date,mem_id,generate_qty)
VALUES ('$g_date', '$M_id', '$g_qty')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:generate.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>