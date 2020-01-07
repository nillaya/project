<?php 

// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   
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
    </style>
    </style>
</head>

<body>
    <!------------------------ nav------------------->
    <?php 
     include('bar/nav.php');
      include('libs/db.php');
     ?>

    <?php

$p_id = $_REQUEST['p_id'];
$sql = "SELECT * FROM product WHERE p_id = $p_id  ";
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
                  <a href="index.php" class="btn btn-outline-info" formaction="index.php">กลับไปหน้าแรก</a>
                   <!-- <button type="submit" class="btn btn-outline-info" formaction="index.php">กลับไปหน้าแรก</button> -->
                   
                </ul>
                <div class="content-box-large">
                    <br><br>
                    <div class="container">
                        <div class="row" align="center">

                            <div class="col-xs-12 col-sm-4 col-md-4">

                                <!-- show product img -->
                                <img src="../pic/<?= $row["p_image"];?>" width="100%"
                                    class="img-thumbnail" />

                            </div>

                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <!-- show product detail -->
                                <h3>รายละเอียดสินค้า</h3>
                                <div align="left">
                                    &nbsp; &nbsp; &nbsp; <h3> <?php echo $row['p_name']; ?> </h3>
                                    &nbsp; <h5> ราคา : <?php echo number_format($row['p_price'],2); ?> บาท </h5>
                                    <h5> Size : <?php echo $row['p_size']; ?></h5>
                                    <h6> รายละเอียด : <?php echo $row['p_detail']; ?> </h6>
                                    <br><br>
                                    <?php echo "<a href='cart.php?p_id=$row[p_id]&act=add' class='btn btn-warning'>หยิบใส่ตะกร้า</a> " ?>
                                    <!-- <button class="w3-button w3-xlarge w3-circle w3-teal">+</button> -->
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