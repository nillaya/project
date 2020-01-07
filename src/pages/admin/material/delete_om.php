<?php
include('../../../libs/db.php');

$ID = $_REQUEST['txtID'];
$sql = " DELETE FROM order_m WHERE om_id =$ID ";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location: order_m.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>