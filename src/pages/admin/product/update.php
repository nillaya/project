<?php
include('../../../libs/db.php');

$ID = $_REQUEST['txtID'];
echo "txtID :".$ID;

$p_name = $_REQUEST['p_name'];
$partner_id= $_REQUEST['partner_id'];
$p_price = $_REQUEST['p_price'];
$p_size = $_REQUEST['p_size'];
$p_qt = $_REQUEST['p_qt'];
$p_detail = $_REQUEST['p_detail'];
$p_price = $_REQUEST['p_price'];
$p_image = $_REQUEST['p_image'];



$sql = "UPDATE  product SET p_name='$p_name', partner_id='$partner_id', p_price='$p_price', p_size='$p_size',
                            p_qt='$p_qt', p_detail='$p_detail', p_image='$p_image' WHERE p_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:product.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>