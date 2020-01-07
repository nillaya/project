<?php
include('../../../libs/db.php');
echo "\n";


$s_date = $_REQUEST['salary_date'];
$g_id = $_REQUEST['generate_id'];
$s_amount = $_REQUEST['salary_amount'];
$status= $_REQUEST['status'];

//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO salary (salary_date,generate_id,salary_amount,status)
VALUES ('$s_date', '$g_id','$s_amount', '$status')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:salary.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>