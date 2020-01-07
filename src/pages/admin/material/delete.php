<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM material WHERE material_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:material.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>