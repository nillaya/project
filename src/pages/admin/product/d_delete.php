<?php
include('../../../libs/db.php');

$xx = $_REQUEST['ID'];
$sql = " DELETE FROM damage WHERE d_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:damage.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>