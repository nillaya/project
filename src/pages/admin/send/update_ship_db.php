<?php
include('../../../libs/db.php');

echo "\n";

$ID = $_REQUEST['ID'];
$status = $_REQUEST['status_shipping'];
$date = $_REQUEST['shipping_date'];
$tracking = $_REQUEST['tracking'];
 //print_r($_POST);
 if($status == 'จัดส่งเรียบร้อย'){

    $sql = "UPDATE shipping
    SET status_shipping = '$status' , shipping_date = '$date', tracking ='$tracking' WHERE shipping.sale_id = '$ID'
 ";
mysqli_query($conn, $sql);




$msg = 'จัดส่งเรียบร้อยแล้ว';
echo "<SCRIPT type='text/javascript'> 
alert('$msg');
window.location.replace(\"send.php\");
</SCRIPT>";
}
    


              
//echo '<script>alert("อัพเดตสถานะเรียบร้อยแล้ว")</script>';
//header( "location:generate.php" );



?>































