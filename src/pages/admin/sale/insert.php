<?php
include('../../../libs/db.php');
echo "\n";

$S_date = $_REQUEST['sale_date'];
$S_total = $_REQUEST['sale_total'];

//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO sale (sale_date ,sale_totalprice)
VALUES ('$S_date', '$S_total')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:sale.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>