<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM member WHERE mem_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:member.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>