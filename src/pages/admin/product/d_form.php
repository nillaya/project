<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../libs/app.php');
//$db = include(__DIR__ . '../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
session_start();
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

    <div class="row">
        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-body">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>สินค้าชำรุด</h3>
                        </div>

                        <div class="panel-options">
                            <a href="form.php"><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="d_insert.php" method="POST" enctype="multipart/form-data" class="form-horizontal"
                            role="form">
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label"> ลำดับ </h5>
                                <div class="col-sm-4">
                                    <span class="form-control"><?php echo $_SESSION['i']?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label"> สินค้า </h5>
                                <div class="col-sm-6">
                                    <?php 
                                     $result= $conn->query("SELECT * FROM product");?>
                                    <input autocomplete="off" type="text" id="p_id " name="p_id" class="form-control"
                                        list='list2' required placeholder="เลือกสินค้า">
                                    <?php $sql= "SELECT * FROM product";
                                          $result= $conn->query($sql); ?>
                                    <datalist id='list2'>
                                          <?php while($row= mysqli_fetch_array($result)) {?>
                                        <option  value=" <?php echo $row['p_id'] ?>" ><?php echo $row["p_name"] ?>
                                        </option><?php }?>
                                    </datalist>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-sm-2 control-label"> จำนวน </h5>
                                <div class="col-sm-4">
                                    <input type="number" name="d_qty" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="save">บันทึก</button>
                                    <button type="submit" class="btn btn-danger "
                                        formaction="damage.php">ยกเลิก</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
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