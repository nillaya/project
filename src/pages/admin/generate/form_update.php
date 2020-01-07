<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../libs/app.php');
//$db = include(__DIR__ . '../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');

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
    $sql = "SELECT * FROM generate where generate_id = '$ID' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
     ?>

    <div class="row">
        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>เพิ่มข้อมูลการผลิต</h3>
                        </div>

                        <div class="panel-options">
                            <a href="form.php"><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form action="update.php?txtID=<?php echo $ID; ?>" class="form-horizontal" role="form">
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">วันที่ผลิต</h5>
                                <div class="col-sm-4">
                                    <input type="date" name="generate_date" class="form-control"
                                        placeholder="วันที่ผลิต" value="<?php echo $row['generate_date'] ?>">
                                </div>
                            </div>


                            <!-- <input type="text"name="m_lastname" class="form-control"  placeholder="นามสกุล"> -->

                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">ผู้ผลิต</h5>
                                <div class="col-sm-4">
                                    <?php 
                              $result= $conn->query("SELECT * FROM member");?>
                                    <input autocomplete="off" type="text" id="mem_id " name="mem_id"
                                        class="form-control" list='list1' required placeholder="เลือกชื่อแม่บ้าน"
                                        value="<?php echo $row['mem_id']?>">
                                    <?php $sql= "SELECT * FROM member"; 
                             $result= $conn->query($sql);  ?>
                                    <datalist id='list1'>
                                        <?php while($row= mysqli_fetch_array($result)) {?>
                                        <option value=" <?php echo $row["mem_id"] ?>">
                                            <?php echo $row["mem_name"]?>&nbsp;&nbsp;<?php echo   $row["mem_lastname"]?>
                                        </option><?php }?>
                                    </datalist>
                                </div>
                            </div>



                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">จำนวน (คู่) </h5>
                                <div class="col-sm-2">
                                    <input type="number" name="generate_qty" class="form-control" placeholder="จำนวน"
                                        value="<?php echo $row['generate_qty']?>">
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
                                    <button type="submit" class="btn btn-danger"
                                        formaction="generate.php">ยกเลิก</button>
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