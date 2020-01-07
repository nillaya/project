<?php
include('../../../libs/db.php');

$ID = $_REQUEST['ID'];
$sql = " DELETE FROM customer WHERE cus_id =$ID";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:customer.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>