<?php

include('../../../libs/db.php');
echo "\n";

$ID = $_REQUEST['sale_id'];
$sql = "SELECT * FROM shipping where shipping.sale_id = '$ID' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
 
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
                <div class="panel-title">
                    <div align="center">
                        <h3>การจัดส่งสินค้า</h3>
                    </div>
                </div>
                <hr>


                <form name="shipping" action="update_ship_db.php?ID=<?php echo $ID; ?>" class="form-horizontal" role="form"
                    method="POST">
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">รหัสการขาย</h5>
                        <div class="col-sm-4">
                            <input type="text" name="sale_id " class="form-control" placeholder="tracking number" value="<?php echo $ID  ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">วันที่ส่งสินค้า</h5>
                        <div class="col-sm-4">
                            <input type="date" name="shipping_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">สถานะการจัดส่ง</h5>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" name="status_shipping" list="list1" placeholder="">
                                <option value="รอดำเนินการ">รอดำเนินการ</option>
                                <option value="จัดส่งเรียบร้อย">จัดส่งเรียบร้อย</option>
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="col-sm-2 control-label"> รูปแบบการส่ง</h5>
                        <div class="col-sm-8">
                            <input type="text" name="shipping" class="form-control" placeholder="" value="<?php echo $row['shipping'] ?>" readonly>
                        </div>
                    </div>


                    <div class="form-group">
                        <h5 class="col-sm-2 control-label">Tracking Number<h5>
                        <div class="col-sm-8">
                            <input type="text" name="tracking" class="form-control" placeholder="tracking number" require >
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <div align="center">
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                                <button type="cancle" class="btn btn-warning " formaction="sale.php">Cancle</button>
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