<?php

include('config.php');
echo "\n";

error_reporting(E_ALL ^ E_NOTICE);

$P_ID = $_REQUEST['P_id'];
$dateout = $_REQUEST['dateO'];
$number = $_REQUEST['txtnumber'];
$FAC_id = $_REQUEST['FAC_id'];

// echo $FAC_id;

// --------------------------------- 1---------------------------------
$txtkati = $_REQUEST['txtkati'];
$txtngadum = $_REQUEST['txtngadum'];
$txtnamFrut = $_REQUEST['txtnamFrut'];
$txtpaggi = $_REQUEST['txtpaggi'];
$txtnamtalpeep = $_REQUEST['txtnamtalpeep'];
$txtegg = $_REQUEST['txtegg'];
$txtpangmun = $_REQUEST['txtpangmun'];
$txtpangkkawjaw = $_REQUEST['txtpangkkawjaw'];

// ---------------------------------2---------------------------------

$sql10 = "SELECT * FROM material where MA_id = '10' ";
$result10 = $conn->query($sql10);
$row10 = mysqli_fetch_assoc($result10);

$sql11 = "SELECT * FROM material where MA_id = '5' ";
$result11 = $conn->query($sql11);
$row11 = mysqli_fetch_assoc($result11);

$sql12 = "SELECT * FROM material where MA_id = '11' ";
$result12 = $conn->query($sql12);
$row12 = mysqli_fetch_assoc($result12);

$sql13 = "SELECT * FROM material where MA_id = '4' ";
$result13 = $conn->query($sql13);
$row13 = mysqli_fetch_assoc($result13);

$sql14 = "SELECT * FROM material where MA_id = '3' ";
$result14 = $conn->query($sql14);
$row14 = mysqli_fetch_assoc($result14);

$sql15 = "SELECT * FROM material where MA_id = '2' ";
$result15 = $conn->query($sql15);
$row15 = mysqli_fetch_assoc($result15);

$sql16 = "SELECT * FROM material where MA_id = '6' ";
$result16 = $conn->query($sql16);
$row16 = mysqli_fetch_assoc($result16);

$sql17 = "SELECT * FROM material where MA_id = '8' ";
$result17 = $conn->query($sql17);
$row17 = mysqli_fetch_assoc($result17);

// ---------------------------------2---------------------------------


if($txtkati <= $row10['MA_number'] AND $txtngadum <= $row11['MA_number'] AND $txtnamFrut <= $row12['MA_number']
AND $txtpaggi <= $row13['MA_number'] AND $txtnamtalpeep <= $row14['MA_number'] AND $txtegg <= $row15['MA_number']
AND $txtpangmun <= $row16['MA_number']AND $txtpangkkawjaw <= $row17['MA_number']

)


{
 

    $sql2 = "UPDATE  material SET  MA_number=MA_number-$txtkati  WHERE  MA_id= '10' ";
    $query2 = mysqli_query($conn, $sql2);

    $sql3 = "UPDATE  material SET  MA_number=MA_number-$txtngadum  WHERE  MA_id= '5' ";
    $query3 = mysqli_query($conn, $sql3);

    $sql4 = "UPDATE  material SET  MA_number=MA_number-$txtnamFrut  WHERE  MA_id= '11' ";
    $query4 = mysqli_query($conn, $sql4);

    $sql5 = "UPDATE  material SET  MA_number=MA_number-$txtpaggi  WHERE  MA_id= '4' ";
    $query5 = mysqli_query($conn, $sql5);

    $sql6 = "UPDATE  material SET  MA_number=MA_number-$txtnamtalpeep  WHERE  MA_id= '3' ";
    $query6 = mysqli_query($conn, $sql6);

    $sql7 = "UPDATE  material SET  MA_number=MA_number-$txtegg  WHERE  MA_id= '2' ";
    $query7 = mysqli_query($conn, $sql7);
    
    $sql8 = "UPDATE  material SET  MA_number=MA_number-$txtpangmun  WHERE  MA_id= '6' ";
    $query8 = mysqli_query($conn, $sql8);

    $sql9 = "UPDATE  material SET  MA_number=MA_number-$txtpangkkawjaw  WHERE  MA_id= '8' ";
    $query9 = mysqli_query($conn, $sql9);




// ---------------------------------2---------------------------------

   
$sql = "INSERT INTO detail_manufacturing (P_id,paggi,ngadum,namFrut,egg,namtalpeep,pangmun,pangkkawjaw,kati,FAC_id)
VALUES ('$P_ID',  '$txtpaggi', '$txtngadum', '$txtnamFrut', '$txtegg', '$txtnamtalpeep', '$txtpangmun', '$txtpangkkawjaw', '$txtkati','$FAC_id')";


if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
   
     //header('Location:show_customer.php');
     echo
     '
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="../../vendor/jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function(){
     console.log("gg backend");
   
         swal({
           title: "แจ้งเตือน!",
           text: "บันทึกการผลิตสำเร็จ",
           icon: "success",
   
       button : {
         visible: true,
         closeModal: true,
       }
     })
   
     .then(() => {
       
       window.location.assign("show_manufacturing.php")
     })
   
     });
     </script>
   
     ';


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

} else {

  echo
  '
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../../vendor/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
  console.log("gg backend");

      swal({
        title: "แจ้งเตือน!",
        text: "วัตถุดิบไม่พอในการผลิต",
        icon: "warning",

    button : {
      visible: true,
      closeModal: true,
    }
  })

  .then(() => {
    
    window.location.assign("../material/show_material.php")
  })

  });
  </script>

  ';

}



$conn->close();



?>