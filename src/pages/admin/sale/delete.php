<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM sale WHERE sale_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:sale.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>