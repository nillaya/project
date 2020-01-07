<?php
include('libs/db.php');


$ID = $_REQUEST['ID'];
echo "ID :".$ID;

$cus_name = $_REQUEST['cus_name'];
$C_mail= $_REQUEST['email'];
$C_tel= $_REQUEST['cus_tel'];
$c_add = $_REQUEST['cus_address'];


$sql = "UPDATE customer SET email='$C_mail' , cus_name='$cus_name' ,  cus_tel='$C_tel' , cus_address='$c_add' WHERE cus_id='$ID'";

if ($conn->query($sql) === TRUE) {

// "Record updated successfully";

 header('Location:profile.php');

} else {

echo "Error updating record: " . $conn->error;

}
?>