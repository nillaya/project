<?php
include('../../../libs/db.php');
echo "\n";

$S_name = $_REQUEST['sup_name'];
$S_tel= $_REQUEST['sup_tel'];
$S_add = $_REQUEST['sup_add'];



//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO supplier (sup_name,sup_tel,sup_add)
VALUES ('$S_name', '$S_tel', '$S_add')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:supplier.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>