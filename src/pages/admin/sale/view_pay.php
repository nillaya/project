<?php
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
<style>

</style>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>






    <div class="row">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="order_m.php">จัดการขาย</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดการขาย</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">



                </div>
                <!---------------------------------------------- sql -->
                <?php  
                                       $ID = $_REQUEST['txtID'];
                                       $sql = "SELECT * FROM payment 
                                       INNER JOIN sale on sale.sale_id = payment.sale_id
                                       WHERE payment.sale_id = $ID ";
                                       $result = $conn->query($sql);
                                       $row = mysqli_fetch_assoc($result); 
                                       ?>
                <!---------------------------------------------- sql -->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="col-xs-12 col-sm-4 col-md-4">

                                <!-- show product img -->
                                <img src="../../../../../nr/pic/<?= $row["pay_bill"];?>" width="100%"
                                    class="img-thumbnail" />

                            </div>

                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <!-- show product detail -->
                                <h3>รายละเอียดการชำระเงิน</h3>
                                <div align="left">
                                    <br><br>
                                    <p>วันที่จ่าย <?php echo $row['pay_date']; ?> </p>
                                    <p> รหัสการขาย : <?php echo $row['sale_id']; ?></p>
                                    <p> ราคาที่ชำระ : <?php echo number_format($row['pay_amount'],2); ?> บาท 
                                    <?php 
                                    $ex = 'ยืนยันการชำระเงิน';
                                    if($row['status_pay'] == $ex){ 
                                    echo "<button class='btn btn-success btn-sm'><i class='glyphicon glyphicon-ok-sign'></i><h7> " . $row["status_pay"]."</h7></button></p>";
                                    echo " <br><br><a href='sale.php' class='btn btn-danger'>กลับ</a>";
                                    } else{  ?>
                                    <br>

                                    <form  action="status_pay.php?ID=<?php echo $ID; ?>" class="form-horizontal" role="form" method="POST">
                                        <div class="form-group">
                                        <p class="col-sm-1 control-label">สถานะ</p>
                                            <div class="col-sm-8">
                                                <select type="text" class="form-control" name="status_pay" id="status_pay" list="list1">
                                                    <option value="ชำระแล้ว">ชำระแล้ว</option>
                                                    <option value="ยืนยันการชำระเงิน">ยืนยันการชำระเงิน</option>
                                                    </option>

                                                </select>
                                            </div>


                                        </div>
                                        <button type="submit" class='btn btn-primary' name="save"> บันทึก </button>
                                    </form>
                                    <?php } ?>
                                        <br><br><br>
                                       
                                      
                                    
                                       
                                </div>
                            </div>


             


                        </div>
                    </div>


                </div>
                <div class="panel-body">

                    <hr>
                    <!-- <a href="sale.php"><button class="button button-n1" style="vertical-align:middle"><span>กลับ</span>
                        </button></a> -->
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