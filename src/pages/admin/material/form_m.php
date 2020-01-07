<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../libs/app.php');
//$db = include(__DIR__ . '../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';


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
                            <h3>เพิ่มข้อมูลวัตถุดิบ</h3>
                        </div>

                        <div class="panel-options">
                            <a href="form_m.php"  ><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="insert.php" class="form-horizontal" role="form">
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">ชื่อ</h5>
                                <div class="col-sm-4">
                                    <input type="text" name="mat_name" class="form-control"  placeholder="ชื่อ">
                                </div>
                                <h5 class="col-sm-1 control-label">หน่วย</h5>
                                <div class="col-sm-3">
                                    <input type="text" name="unit" class="form-control"  placeholder="หน่วย">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">จำนวน</h5>
                                <div class="col-sm-8">
                                    <input type="text"name="mat_qty" class="form-control"  placeholder="จำนวน">
                                </div>
                          </div>
                          
                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">Readonly</label>
                                <div class="col-sm-10">
                                    <span class="form-control">Read only text</span>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="submit" class="btn btn-danger " formaction="material.php">ยกเลิก</button>
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