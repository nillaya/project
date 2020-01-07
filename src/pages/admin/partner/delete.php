<?php
include('../../../libs/db.php');

$xx = $_REQUEST['txtID'];
$sql = " DELETE FROM partners WHERE partner_id =$xx";
if ($conn->query($sql) === TRUE) {

// echo "Record deleted successfully";
 header('Location:partner.php');
} else {
echo "Error deleting record: " . $conn->error;
}
$conn->close();

?>