<?php
// $config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../../libs/app.php');
//$db = include(__DIR__ . '../../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
echo "\n";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php

$ID = $_REQUEST['txtID'];
$sql = "SELECT * FROM product INNER JOIN partner on partner.partner_id=product.partner_id  WHERE product.p_id = $ID ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>


    <div class="row">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="product.php">ข้อมูลสินค้า</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดสินค้า</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>รายละเอียด</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="form_mem.php"><i class="glyphicon glyphicon-plus"></i></a>
                        
                        <a href="../pdf/member_print.php"><i class="glyphicon glyphicon-print"></i></a> -->
                        <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href='update_f.php'><button class="button button-n2"
                                style="vertical-align:middle"><span>แก้ไข</span> </button></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                               
                                <table id="customer">
                                    <thead>
                                    <tbody>
                                        <tr>
                                           
                                            <td bgcolor="#f2f2f2">รูปสินค้า</td>
                                            <td><?php echo '<img src="../../pic/' . $row["p_image"].'"style="width:150px;height:150px;"/>'?>
                                            </td>


                                        </tr>
                                        <tr>


                                            <td width=25% bgcolor="#f2f2f2">รหัสสินค้า</td>
                                            <td><?php echo $row['p_id']?></td>

                                        </tr>
                                        <tr>


                                            <td width=25% bgcolor="#f2f2f2">ชื่อสินค้า</td>
                                            <td><?php echo $row['p_name']?></td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">ราคา</td>
                                            <td><?php echo $row['p_price'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">Size</td>
                                            <td><?php echo $row['p_size'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">จำนวนสินค้า</td>
                                            <td><?php echo $row['p_qt'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">รายละเอียดสินค้า</td>
                                            <td><?php echo $row['p_detail'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">แบรนด์สินค้า</td>
                                            <td><?php echo $row['p_brand'] ?></td>

                                        </tr>
                                       

                                    </tbody>

                                    </thead>
                                </table>
                            </section>
                        </div>
                    </div>



                </div>
                <div class="panel-body">
                    <a href="product.php"><button class="button button-n1"
                            style="vertical-align:middle"><span>กลับ</span> </button></a>
                </div>
            </div>
        </div>

        <div class="panel-body">

        </div>
    </div>
    </div>
    <div class="col-md-6">

        <div class="row">

        </div>
    </div>
    </div>



    </div>
    </div>
    </div>
    </div>



    <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 <a href='#'>Website</a>
            </div>

        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../../assets/jquery/jquery.js"></script>
    <script src="../../../../assets/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../../../js/custom.js"></script>
</body>

</html>