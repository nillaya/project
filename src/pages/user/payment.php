<?php 
include('libs/db.php');
// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   

$sale_id = $_REQUEST['sale_id'];
$sql =" SELECT * FROM sale WHERE sale_id = $sale_id  ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

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
    <div class="main-panel" >
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <!-- ข้อมูลการทำงาน -->
                </h3>
            </div>
            <div class="col-12 grid-margin" >
                <div class="card" style="margin-left:200px;margin-right:200px;">
                    <div class="card-body">
                        <h4 align="center" class="card-title"></h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-3"></div>
                    </div>
                        <div class="row"  style="margin-left:70px;margin-right:70px;"> 
                            <div class="col-sm-6 cmp-pnl" >
                                <div id="panel" class="inner-cmp-pnl">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <h3 class="title">ช่องทางการชำระเงิน</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row"  style="margin-left:70px;margin-right:70px;">
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">ธนาคารไทยพาณิช</h4>
                                            <hr>
                                            <p>เลขบัญชี : 845-65984-55</p>
                                            <hr>
                                            <p>ชื่อบัญชี : Tlejourn </p>
                                            <p>สาขา  : ปัตตานี </p>
                                        </div>
                                    </div>
                                    <div class="form-group row"  style="margin-left:70px;margin-right:70px;">
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-heading">ธนาคารกรุงไทย</h4>
                                            <hr>
                                            <p>เลขบัญชี : 222-444-6458</p>
                                            <hr>
                                            <p>ชื่อบัญชี : Tlejourn </p>
                                            <p>สาขา  : ปัตตานี </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 cmp-pnl">
                                <div class="inner-cmp-pnl">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h3 class="title">ชำระเงิน</h3>
                                        </div>
                                    </div>
                                    <form action="paydb.php" method="POST" enctype="multipart/form-data" name="addprd">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <!-- <p align="left"> รหัสการสั่งซื้อ</p> -->
                                                <input type="hidden" name="sale_id" class="form-control" required
                                                    value=" <?php echo $sale_id ; ?>" />
                                                    <input type="hidden" name="status_pay" class="form-control" value="ชำระแล้ว" />
                                            </div>
                                        </div>
                                       <br><br>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p align="left"> วันที่ชำระ </p>
                                                <input type="date" value="<?php echo date("Y-m-d") ?>" name="pay_date"
                                                    class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p align="left"> จำนวนเงินที่ชำระ (บาท) *รวมค่าจัดส่ง </p>
                                                <input type="text" name="pay_amount" class="form-control" required
                                                    value=" <?php echo $row['sale_total']; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p align="left"> หลักฐานการชำระ </p>
                                                <input type="file" name="pay_bill" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <br><button type="submit" class="btn btn-primary" name="save"
                                                    value="save">
                                                    ยืนยันการชำระ </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div> 
                        </div>

                </div>
            </div>
        </div>

    <!------------------------         nav     ------------------->
        <div class="jumbotron text-center" style="margin-bottom:0">
            <p>Footer</p>
        </div>
    </div>
</body>
</html>