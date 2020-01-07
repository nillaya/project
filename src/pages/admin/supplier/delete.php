<?php
include('../../../libs/db.php');

$xx = $_REQUEST['ID'];
$sql = " DELETE FROM supplier WHERE sup_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:supplier.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>