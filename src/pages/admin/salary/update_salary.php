<?php

include('../../../libs/db.php');
echo "\n";

$ID = $_REQUEST['ID'];
$sql = "SELECT * FROM generate INNER JOIN member on  generate.mem_id = member.mem_id
WHERE generate.generate_id= '$ID' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <div class="panel-title">
                    <div align="center">
                        <h3>ค่าตอบแทน</h3>
                    </div>
                </div>
                <hr>


                <form name="shipping" action="update_db.php?ID=<?php echo $ID; ?>" class="form-horizontal" role="form"
                    method="POST">
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">รหัสการผลิต</h5>
                        <div class="col-sm-4">
                            <input type="text" name="generate_id " class="form-control"  value="<?php echo $ID  ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label"> แม่บ้านที่ผลิต</h5>
                        <div class="col-sm-8">
                            <input type="text" name="mem_id" class="form-control" placeholder="" value="<?php echo $row['mem_name'] ."&nbsp; &nbsp; ". $row['mem_lastname'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">จำนวนที่ผลิต</h5>
                        <div class="col-sm-4">
                            <input type="text" name="generate_qty" class="form-control" value="<?php echo $row['generate_qty']?>" >
                        </div>
                    </div>
                    <?php $total = 0;
                    $total = $total+($row['generate_qty'] * 130 );
                     ?>
                    
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">จำนวนเงินทั้งหมด</h5>
                        <div class="col-sm-4">
                            <input type="text" name="salary_amount" class="form-control" value="<?php echo $total; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">สถานะการจ่ายเงิน</h5>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" name="status_salary" list="list1" placeholder="">
                            <option value="ยังไม่จ่าย">ยังไม่จ่าย</option>
                            <option value="จ่ายแล้ว">จ่ายแล้ว</option>
                                
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">วันที่จ่ายเงิน</h5>
                        <div class="col-sm-4">
                            <input type="date" name="salary_date" class="form-control">
                        </div>
                    </div>

                    

                    <br>
                    <br>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <div align="center">
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                                <button type="cancle" class="btn btn-warning " formaction="salary.php">Cancle</button>
                            </div>
                        </div>
                    </div>

                </form>

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