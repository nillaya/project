<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];

echo "txtID :".$ID;

$g_date = $_REQUEST['generate_date'];
$M_id = $_REQUEST['mem_id'];
$g_qty= $_REQUEST['generate_qty'];


$sql = "UPDATE generate SET generate_date='$g_date' , mem_id='$M_id',
generate_qty='$g_qty' WHERE generate_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:generate.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>