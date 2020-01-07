<?php
include('../../../libs/db.php');


$ID = $_REQUEST['txtID'];

echo "txtID :".$ID;

$P_name = $_REQUEST['partner_name'];
$P_mail = $_REQUEST['partner_mail'];
$P_tel = $_REQUEST['partner_tel'];
$P_add= $_REQUEST['partner_add'];


$sql = "UPDATE partner SET partner_name='$P_name' , partner_mail='$P_mail' , partner_tel='$P_tel',
partner_address='$P_add' WHERE partner_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:partner.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>