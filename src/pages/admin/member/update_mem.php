<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];

echo "txtID :".$ID;

$M_name = $_REQUEST['m_name'];
$M_lastname = $_REQUEST['m_lastname'];
$M_tel= $_REQUEST['m_tel'];
$M_add = $_REQUEST['m_add'];


$sql = "UPDATE member SET mem_name='$M_name' , mem_lastname='$M_lastname',
mem_tel='$M_tel' , mem_address='$M_add' WHERE mem_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:member.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>