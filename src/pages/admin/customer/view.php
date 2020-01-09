<?php
include('../../../libs/db.php');
echo "\n";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

$ID = $_REQUEST['ID'];
$sql = "SELECT * FROM customer where cus_id = '$ID' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>


    <div class="row">
        <div class="col-md-9">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <a href="customer.php"><button class="button button-n1"
                            style="vertical-align:middle"><span>กลับ</span> </button></a>
                </div>

                <!-- <div class="panel-heading">
                    <div class="panel-title" >
                        <h3>รายละเอียด</h3>
                    </div>

                    <div class="panel-options">
                        <a href="form_cus.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href='update_form.php'><button class="button button-n2"
                                style="vertical-align:middle"><span>แก้ไข</span> </button></a>
                    </div>  
                </div> -->
                <div class="panel-title" >
                        <h3 align="center">รายละเอียด</h3>
                    </div>
                <div class="panel-body">
                    

                    <div class="row">
                        <div class="col-sm-12">
                            
                            <section class="panel">

                                <table id="customer">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <td bgcolor="#f2f2f2">รหัส</td>
                                            <td><?php echo $row['cus_id'] ?></td>

                                        </tr>
                                        <tr>
                                            <!-- <td rowspan="2">1</td> -->

                                            <td width=25% bgcolor="#f2f2f2">ชื่อ-นามสกุล</td>
                                            <td><?php echo $row['cus_name']?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">E-username</td>
                                            <td><?php echo $row['username'] ?></td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">E-mail</td>
                                            <td><?php echo $row['email'] ?></td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">เบอร์โทร</td>
                                            <td><?php echo $row['cus_tel'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">ที่อยู่</td>
                                            <td><?php echo $row['cus_address'] ?></td>

                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                            </section>
                        </div>
                    </div>



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