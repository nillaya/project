<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM generate WHERE generate_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:generate.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>