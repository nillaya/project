<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];

echo "txtID :".$ID;

$s_date = $_REQUEST['salary_date'];
$g_id= $_REQUEST['generate_id'];


$sql = "UPDATE generate SET salary_date='$s_dat' , generate_id='$g_id'  WHERE generate_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:salary.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>