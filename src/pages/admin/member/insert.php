<?php
include('../../../libs/db.php');
echo "\n";

$M_name = $_REQUEST['m_name'];
$M_lastname = $_REQUEST['m_lastname'];
$M_tel= $_REQUEST['m_tel'];
$M_add = $_REQUEST['m_add'];

//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO member (mem_name,mem_lastname,mem_tel,mem_address)
VALUES ('$M_name', '$M_lastname', '$M_tel','$M_add')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:member.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>