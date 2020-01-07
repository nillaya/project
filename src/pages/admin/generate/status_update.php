<?php
include('../../../libs/db.php');

echo "\n";


$ID = $_REQUEST['ID'];
$status_up = $_REQUEST['status'];

//$ID = $_POST['ID'];
//$status = $_POST['status'];

 //print_r($_POST);

$sql = "
   UPDATE generate
   SET status = '$status_up'
   WHERE generate.generate_id = '$ID'
";
mysqli_query($conn,$sql);

//------------เพิ่มสินค้าจากการผลิตเมื่อเปลี่ยนสถานะ-----------
$sql3 ="SELECT * FROM generate WHERE generate_id = $ID  ";
$result = mysqli_query($conn, $sql3);
while($row = mysqli_fetch_array($result)){
  $p_id = $row['p_id'];
  $qty = $row['generate_qty'];  
}

$sql2 = "UPDATE  product
SET      p_qt = p_qt + $qty
WHERE product.p_id = $p_id ";
mysqli_query($conn, $sql2);

//--------------ตัดวัถุดิบที่ใช้ผลิตเมื่อเปลี่ยนสถานะ-------------
$sql4 ="SELECT * FROM generate_detail WHERE generate_detail.generate_id = $ID  ";
$result = mysqli_query($conn, $sql4);
while($row = mysqli_fetch_array($result)){
  $mat_id = $row['material_id'];
  $m_qty = $row['m_qty'];  


$sql5 = "UPDATE  material
SET      mat_qty = mat_qty - $m_qty
WHERE material.material_id = $mat_id ";
mysqli_query($conn, $sql5);
}




              $msg = 'อัพเดทข้อมูลสำเร็จ';
              echo "<SCRIPT type='text/javascript'> 
              alert('$msg');
              window.location.replace(\"generate.php\");
              </SCRIPT>";
              
//echo '<script>alert("อัพเดตสถานะเรียบร้อยแล้ว")</script>';
//header( "location:generate.php" );



?>



































