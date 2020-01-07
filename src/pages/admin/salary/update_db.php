<?php
include('../../../libs/db.php');

echo "\n";

$ID = $_REQUEST['ID'];
$generate_qty = $_REQUEST['generate_qty'];
$salary_date = $_REQUEST['salary_date'];
$salary_amount = $_REQUEST['salary_amount'];
$status = $_REQUEST['status_salary'];
 //print_r($_POST);



    $sql = "INSERT INTO salary (salary_date, salary_amount, status_salary, generate_id )
                VALUE('$salary_date', '$salary_amount', '$status' , '$ID')";
             mysqli_query($conn, $sql);

if($status == 'จ่ายแล้ว'){
    $st='2'; 
    $sql1 = "UPDATE generate SET sta = '$st' 
    WHERE generate.generate_id = '$ID'";
    mysqli_query($conn, $sql1);
 }






$msg = 'อัพเดตเรียบร้อยแล้ว';
echo "<SCRIPT type='text/javascript'> 
alert('$msg');
window.location.replace(\"salary.php\");
</SCRIPT>";

    


              
//echo '<script>alert("อัพเดตสถานะเรียบร้อยแล้ว")</script>';
//header( "location:generate.php" );



?>































