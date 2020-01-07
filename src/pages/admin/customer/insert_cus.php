<?php
include('../../../libs/db.php');
echo "\n";

$C_name = $_REQUEST['c_name'];
$C_mail = $_REQUEST['c_mail'];
$C_tel= $_REQUEST['c_tel'];
$C_add = $_REQUEST['c_add'];

//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO customer (cus_name,email,cus_tel,cus_address)
VALUES ('$C_name', '$C_mail', '$C_tel','$C_add')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:customer.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>