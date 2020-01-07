<?php
include('../../../libs/db.php');
echo "\n";

$M_name = $_REQUEST['mat_name'];
$M_unit = $_REQUEST['unit'];
$M_amount = $_REQUEST['mat_qty'];

$sql = "INSERT INTO material (mat_name,mat_qty,unit)
VALUES ('$M_name', '$M_amount', '$M_unit')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:material.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>


