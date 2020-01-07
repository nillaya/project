<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];
echo "txtID :".$ID;

$S_name = $_REQUEST['sup_name'];
$S_tel= $_REQUEST['sup_tel'];
$S_add = $_REQUEST['sup_add'];




$sql = "UPDATE supplier SET sup_name='$S_name' , sup_tel='$S_tel' , sup_add='$S_add'
WHERE sup_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:supplier.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>