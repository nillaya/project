<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];

echo "txtID :".$ID;

$M_name = $_REQUEST['mat_name'];
$M_qty = $_REQUEST['mat_qty'];
$M_unit = $_REQUEST['unit'];




$sql = "UPDATE material SET mat_name='$M_name' , mat_qty='$M_qty', unit='$M_unit'   WHERE material_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:material.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>