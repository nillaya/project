<?php 

// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   
$c_id = $_SESSION['u_id'];
$sale_id = $_REQUEST['ID'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/jquery.min.js"></script>
    <script src="libs/popper.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <link href="libs/font-awesome.min.css">
    <link href="libs/style.css" rel="stylesheet">
    <link href="libs/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    <style>ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        /* content: "/\00a0"; */
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    table {
        /* border-collapse: collapse; */
        border: 0px ;
    }
    </style>

</head>

<body>
    <!------------------------ nav------------------->
    <?php 
     include('bar/nav.php');
      include('libs/db.php');
     ?>

    <?php

//$p_id = $_REQUEST['p_id'];
$sql = "SELECT * FROM customer WHERE cus_id = $c_id   ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:40px;margin-right:40px;">

        <div class="row">
            <div class="col-md-2">
                <?php include('bar/si.php'); ?>
            </div>

            <div class="col-md-10">

                <ul class="breadcrumb">
                    
                    <!-- <button type="submit" class="btn btn-outline-info" formaction="index.php">กลับไปหน้าแรก</button> -->

                </ul>
                <div class="content-box-large">
                    <br><br>
                    <div class="container" style="margin-left:40px;margin-right:40px;">
                    <div align="left"> <a href="index.php" class="btn btn-info" formaction="index.php">กลับไปหน้าแรก</a> &nbsp;&nbsp;
                       <a href="profile_edit.php?id=<?php echo $row['cus_id']?>" class="btn btn-danger" >แก้ไขข้อมูล</a></div><br><br>
                      
                
                        <div class="panel-title" align="center">
                                        <h3>ประวัติการสั่งซื้อ</h3>
                        </div>
                                    <hr />
                                    <?php  
                                   
                                    $query = "SELECT * FROM sale 
                                    INNER JOIN payment on sale.sale_id = payment.sale_id
                                    INNER JOIN shipping on sale.sale_id = shipping.sale_id
                                    INNER JOIN customer on sale.c_id = customer.cus_id
                                    WHERE sale.sale_id = $sale_id  ";  
                                    $result = mysqli_query($conn, $query);  
                                    if(mysqli_num_rows($result) > 0)  
                                    {                                                               
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                                     ?>
                                    <div class="row">

                                        <!-- <section class="panel" style="margin-left:40px;margin-right:40px;"> -->

                                            <table>
                                                <tr >
                                                    <td align="left" width="30%">วันที่สั่งสินค้า : </td>
                                                    <td align="left"><?php echo $row['sale_date']?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left"> ชื่อ-สกุล: </td>                                                    
                                                    <td align="left"> <?php echo $row['cus_name']?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">ที่อยู่จัดส่ง:</td>
                                                    <td align="left"><?php echo $row['cus_address']?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td align="left"> รวมเป็นเงิน : </td>
                                                    <td align="left"><?php echo $row['sale_total']?>  &nbsp;&nbsp;  <?php echo $row['status_pay']?> </td>
                                                </tr>
                                                <tr>
                                                    <td> สถานะการจัดส่ง :</td>
                                                    <td><?php echo $row['status_shipping']?> </td>
                                                    
                                                </tr>
                                                <td></td>
                                                    
                                                </tr>
                                            </table>
                                        <!-- </section> -->




                                        <br>
                                        <?php  
                                    }
                                }
                                     ?> 





                        <br><br>
                        <!-- <?php echo "<a href='cart.php?p_id=&act=add' class='btn btn-warning'>หยิบใส่ตะกร้า</a> " ?> -->

                    </div>


                </div>



            </div>
        </div>




    </div>
    </div>
    </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </div>




</body>

</html>