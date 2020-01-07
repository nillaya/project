<?php
include('../../../libs/db.php');
echo "\n";

$S_add = $_REQUEST['send_add'];
$S_date = $_REQUEST['send_date'];
$S_add= $_REQUEST['send_form'];


//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO member (send_address,send_date,send_form)
VALUES ('$S_add', '$S_date', '$S_add')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:send.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>