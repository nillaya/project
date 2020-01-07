<?php
include('../../../libs/db.php');

echo "\n";


$ID = $_REQUEST['ID'];
$status = $_REQUEST['status_pay'];

//$ID = $_POST['ID'];
//$status = $_POST['status'];

 //print_r($_POST);

$sql = "UPDATE payment
   SET status_pay = '$status'
   WHERE payment.sale_id = '$ID' ";
mysqli_query($conn,$sql);


$sql3 ="SELECT * FROM sale_detail WHERE sale_detail.sale_id = $ID  ";
$result = mysqli_query($conn, $sql3);
while($row = mysqli_fetch_array($result)){
  $p_id = $row['p_id'];
  $qty = $row['sd_qty'];  
}

$sql2 = "UPDATE  product
SET      p_qt = p_qt-$qty
WHERE product.p_id = $p_id ";

mysqli_query($conn, $sql2);




              $msg = 'ตัดสต็อคสินค้าเรียบร้อยแล้ว';
              echo "<SCRIPT type='text/javascript'> 
              alert('$msg');
              window.location.replace(\"sale.php\");
              </SCRIPT>";

              
//echo '<script>alert("อัพเดตสถานะเรียบร้อยแล้ว")</script>';
//header( "location:generate.php" );



?>