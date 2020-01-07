<?php
include('../../../libs/db.php');

$ID = $_REQUEST['ID'];
$sql = " DELETE FROM booth WHERE booth_id =$ID";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:booth.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>