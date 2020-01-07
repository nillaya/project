

<?php
include('../../../libs/db.php');
echo "\n";

$p_name = $_REQUEST['partner_name'];
$p_mail = $_REQUEST['partner_mail'];
$p_tel = $_REQUEST['partner_tel'];
$p_address = $_REQUEST['partner_address'];


//echo "passwd :".$RepeatPassword;

$sql = "INSERT INTO partner (partner_name,partner_mail,partner_tel,partner_address)
VALUES ('$p_name', '$p_mail', '$p_tel', '$p_address')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:partner.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>