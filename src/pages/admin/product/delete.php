<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM product WHERE p_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:product.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>