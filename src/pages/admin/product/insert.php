<?php
include('../../../libs/db.php');
echo "\n";

$P_name = $_REQUEST['p_name'];
$Part = $_REQUEST['partner_id'];
$P_price = $_REQUEST['p_price'];
$P_pic= $_REQUEST['pic'];
$P_detail= $_REQUEST['p_detail'];

$sql = "INSERT INTO product (p_name,partner_id,p_price,p_image,p_detail)
VALUES ('$P_name', '$Part', '$P_price', '$P_pic', '$P_detail')";

if ($conn->query($sql) === TRUE) {
 header('Location:product.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>

