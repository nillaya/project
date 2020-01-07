<?php 
include('libs/db.php');
// error_reporting( error_reporting() & ~E_NOTICE );
session_start();  
$c_id =$_SESSION['u_id'] ;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 4 Website Example</title>
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
        border: 0px;
    }
    </style>

</head>

<body>
    <!------------------------ nav------------------->
    <?php 
     include('bar/nav.php');
      include('libs/db.php');
     ?>


    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:200px;">
        <div class="col-md-10">

            <div class="content-box-large">

                <br><br>
                <div class="container" style="margin-left:20px;margin-right:20px;">


                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-5">
                                    <div class="panel-title" align="center">
                                        <h3>ประวัติการสั่งซื้อ</h3>
                                    </div>
                                    <hr />
                                    <?php  
                                    $query = "SELECT * FROM sale 
                                    INNER JOIN payment on sale.sale_id = payment.sale_id
                                    INNER JOIN shipping on sale.sale_id = shipping.sale_id
                                    WHERE sale.c_id = $c_id order BY sale.sale_id DESC ";  
                                    $result = mysqli_query($conn, $query);  
                                    if(mysqli_num_rows($result) > 0)  
                                    {                                                               
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                                     ?>
                                    <div class="row">
                                        <div class="card bg-light text-dark">
                                            <div class="card-body">
                                                <h3 class="card-title"><b></b></h3>
                                              
                                                <br>
                                                <table width="1000px">
                                                     <tr align="left">
                                                        <th>วันที่สั่งสินค้า :</th>
                                                        <td> <?php echo $row['sale_date'] ?></td>
                                                    </tr>
                                                    <tr align="left">
                                                        <th width="10%">จำนวนเงิน :</th>
                                                        <td><?php echo $row['sale_total'] ?></td>
                                                    </tr>
                                                    <tr align="left">
                                                        <th width="10%">สถานะ :</th>
                                                        <td><?php echo $row['status_pay'] ?></td>
                                                    </tr>                                                   
                                                    <tr align="left">
                                                        <td>Tracking:</td>
                                                        <?php if($row['status_shipping'] == 'รอดำเนินการ'){ ?>
                                                        <td> <?php echo $row['status_shipping'] ?></td>
                                                        <?php }else{
                                                          echo " <td>".  $row['tracking']. "</td>";  
                                                        }?>
                                                    </tr>
                                                </table>
                                                <div align="right">
                                               <?php echo "<a href='#' class='btn btn-primary btn-sm' >ดูรายละเอียด</a>" ?>
                                                </div>



                                            </div>
                                            <!-- card -->
                                        </div>
                                    </div>
                                    <br>
                                    <?php  
                                    }
                                }
                                     ?>
                                </div>
                                    <br>




                                </div>
                                <br>
                                <!-- card -->
                            </div>
                        </div>

                        <!-- card -->
                        <br><br>







                    </div>

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