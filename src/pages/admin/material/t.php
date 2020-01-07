<!DOCTYPE html>
<html>

<head>
    <title>BATIK DENARA</title>

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="./../css/style.css" rel='stylesheet' type='text/css' />
    <link href="./../css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="./../css/font.css" type="text/css" />
    <link href="./../css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="./../css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="./../js/jquery2.0.3.min.js"></script>
    <script src="./../js/raphael-min.js"></script>
    <script src="./../js/morris.js"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <?php include('./../pages/bar/navbar.php')?>
        <!--header end-->
        <!--sidebar start-->
        <?php include('./../pages/bar/sidebar.php')?>
        <?php include('./../lib/db.php')?>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- //market-->
                <div class="alert alert-info" role="alert">
                    <strong><a href="#">
                            <h4>รายละเอียดการสั่งซื้อวัตถุดิบ
                        </a></strong>
                </div>
              
                <div align="right">
                <a href="order_mat.php" button type="button" class="btn btn-primary"> กลับ</a></button>
                <a href="./../MPDF61/ordermartrial_print.php?id=<?php echo $_GET['id']?>"  button type="button" class="btn btn-success">พิมพ์ข้อมูลการสั่งซื้อ</a></button>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="table-agile-info">

                        <center>
                            <h4>รายการการสั่งซื้อวัตถุดิบ<h4>
                        </center><br><br>
                        <!-- อันนี้เป็นหัวข้อที่ทเราอยากให้มีในการสั่งซื้อ -->
                        <?php
                                    $order_mart_id = $_REQUEST['id'];                   
                                    $sql1 = "SELECT    
                                    emp.employee_id,
                                    emp.employee_name,
                                    emp.employee_lname,
                                    suplier.Supp_name,
                                    suplier.Supp_email,
                                    suplier.Supp_tel,
                                    suplier.Supp_address,
                                    order_mart.order_mart_id,
                                    order_mart.employee_id,
                                    order_mart.date_matr,
                                    order_mart.status
                                    FROM
                                    order_mart
                                    INNER JOIN emp ON order_mart.employee_id = emp.employee_id
                                    INNER JOIN suplier ON suplier.Supp_id    = order_mart.Supp_id
                                    WHERE order_mart.order_mart_id = '".$_GET['id']."' ";
                                     $query1 = $conn ->query($sql1);
                                     $row1 = mysqli_fetch_array($query1);
                        
// *****************************************************************************************************************************
// <!-- อันนี้เป็นหัวข้อที่ทเราอยากให้มีในตารางรายละเอียดการสั่งซื้อ -->
                                    $sql2 = "SELECT detail_ordermart.detialordermart_id, 
                                    detail_ordermart.mart_id, 
                                    detail_ordermart.amout, 
                                    detail_ordermart.price, 
                                    detail_ordermart.order_mart_id, 
                                    material.mart_id,
                                    material.mart_name 
                                    FROM detail_ordermart 
                                    INNER JOIN material ON detail_ordermart.mart_id = material.mart_id 
                                    INNER JOIN order_mart ON detail_ordermart.order_mart_id = order_mart.order_mart_id 
                                    WHERE order_mart.order_mart_id = '".$row1['order_mart_id']."' ";
                                    $query2 = mysqli_query($conn,$sql2);   

                                    $price =0;

                                ?>

                        <div class="container">
                            <label for="order_mart_id">รหัสสั่งซื้อ : &nbsp; </label>
                            <?php echo $row1['order_mart_id']; ?> <br><br>

                            <label for="date_matr">วันที่สั่งซื้อ : &nbsp; </label>
                            <?php echo $row1['date_matr']; ?> <br><br>

                            <label for="Supp_name">ชื่อร้าน :&nbsp;</label>
                            <?php echo $row1['Supp_name']; ?><br><br>

                            <label for="Supp_email">อีเมล์ :&nbsp; </label>
                            <?php echo $row1['Supp_email']; ?><br><br>

                            <label for="Supp_tel">เบอร์โทรศัพท์ :&nbsp; </label>
                            <?php echo $row1['Supp_tel']; ?><br><br>

                            <label for="Supp_address">ที่อยู่ : &nbsp;</label>
                            <?php echo $row1['Supp_address']; ?><br><br>


                            <label for="employee_name">ชื่อพนักงาน :&nbsp;</label>
                            <?php echo $row1['employee_name']; ?>&nbsp;&nbsp;</label><?php echo $row1['employee_lname']; ?><br><br>

                            <label for="status">สถานะ : &nbsp; </label>
                            <?php echo $row1['status']; ?> <br><br>
                        </div>
                        <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="panel-heading">
                                material
                            </div>
                            <div>
                                <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <?php $i = 0; ?>
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อวัตถุดิบ</th>
                                            <th>จำนวน</th>
                                            <th>ราคาต่อหน่วย</th>
                                            <th>ราคารวม</th>
                                        <tr>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        $total =0;
                                        $sum_price = 0;
                                        while($row=mysqli_fetch_assoc($query2))
                                        {
                                            ?>
                                            <tr>
                                                <td ><?php echo $i?></td>
                                                <td><?php echo $row['mart_name']?></td>
                                                <td><?php echo $row['amout']?></td>
                                                <td><?php echo $row['price']?></td>
                                                <td><?=$total_price = $row["amout"] * $row["price"]?></td>
                                                <?php $price=$price + $row['price']* $row['amout']?>
                                            </tr>

                                        
                                        <?php
                                    $i++;
                                    } 
                                    // }
                                    // else
                                    // {
                                    // echo "No Recoer Found";
                                    // }
                                    ?>
                                        <tr>
                                            <td colspan="15" aling="right">ยอดรวมทั้งหมด</td>
                                            <td align="left"><?php echo number_format($price, 2); ?>  บาท</td>
                                        </tr>
                                    </tbody>
                                    </table>

                                   
                            </table>
                            </div>
                    </div>
                </div>


                <!-- //market-->
                <div class="row">
                    <div class="panel-body">
                        <div class="col-md-12 w3ls-graph">
                            <!--agileinfo-grap-->

                            <!--//agileinfo-grap-->

                        </div>
                    </div>
                </div>
                <div class="agil-info-calendar">
                    <!-- calendar -->

                    <!-- //calendar -->

                    <!--notification start-->



                    <!--notification end-->
                </div>
                </div>
                <div class="clearfix"> </div>
                </div>
                <!-- tasks -->

                <!-- //tasks -->
                <div class="agileits-w3layouts-stats">
                    <div class="col-md-4 stats-info widget">



                    </div>
                </div>


                </div>
            </section>
            <!-- footer -->

            <!-- footer -->
            <div class="footer">
                <!--กรอบของfooter-->
                <div class="wthree-copyright">
                    <p>© 2019 BATIK | DENARA </p>
                    <!--อักษรของfooter-->
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="./../js/bootstrap.js"></script>
    <script src="./../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="./../js/scripts.js"></script>
    <script src="./../js/jquery.slimscroll.js"></script>
    <script src="./../js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="./../js/jquery.scrollTo.js"></script>
    <!-- morris JavaScript -->

    <!-- calendar -->

    <!-- //calendar -->
</body>

</html>