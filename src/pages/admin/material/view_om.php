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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
</head>
<style>
.right {
    position: absolute;
    right: 0px;
    width: 400px;
    padding: 10px;
}
</style>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

     <?php
// $ID = $_REQUEST['txtID'];
// $sql = "SELECT * FROM order_m  ";
// $result = $conn->query($sql);
// $row = mysqli_fetch_array($result);
?>



    <div class="row">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="order_m.php">ข้อมูลการสั่งซื้อ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดการสั่งซื้อ</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">

                    <h2 align="center">ใบสั่งซื้อสินค้า </h2>


                    <!-- <div class="panel-options">
                      
                        <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href='update_f.php'><button class="button button-n2"
                                style="vertical-align:middle"><span>แก้ไข</span> </button></a>
                    </div> -->
                    <!-- <br>
                    <div class="right">
                    <b>เลขที่ใบสั่งซื้อ : </b>
                    </div>
                    <br> -->
                </div>
<!---------------------------------------------- sql -->
                <?php  
                                       $ID = $_REQUEST['txtID'];
                                       $sql1 = "SELECT * FROM order_m 
                                        INNER JOIN supplier on order_m.sup_id = supplier.sup_id "; 
                                       $result1 = $conn->query($sql1);
                                       $row1 = mysqli_fetch_assoc($result1); 
                                       ?>
<!---------------------------------------------- sql -->
               
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <section class="panel">

                                <table>
                                    <tr>
                                        <td>
                                            <h7><b>เลขที่ใบสั่งซื้อ: </b><?php echo $row1['om_id']?></h7>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h7><b>วันที่สั่งสินค้า: </b><?php echo $row1['om_date']?></h7>
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                        <td width="10%">
                                            <h7><b>ซัพพลายเออร์: </b><?php echo $row1['sup_name']?></h7>
                                        </td>
                                        <td width="20%">
                                            <h7><b>เบอร์โทร: </b><?php echo $row1['sup_tel']?></h7>
                                        </td>
                                    </tr>
                                </table>
                            </section>


                            <section class="panel">
                                <table id="cus">
                                    <thead>
                                        <tr>
                                            <th align="center" scope="col">ลำดับ</th>
                                            <th scope="col">รายการ</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col"> ราคา/หน่วย</th>
                                            <th scope="col" width="20%">จำนวนเงิน</th>
                                    </thead>
                                    </tr>

                                    <?php
                                        $i = 1;
                                        $total=0;
                                       //ตารางลายละเอียดสั่งซื้อ  -->
                                        
                                             
                                             $sql2 = "SELECT * FROM order_md 
                                                           INNER JOIN material on order_md.material_id = material.material_id
                                                           INNER JOIN order_m on order_md.om_id = order_m.om_id 
                                                            WHERE order_m.om_id = '$ID'";
                                                            $query2 = mysqli_query($conn,$sql2);   
                                                            
                                                      
                                       // <!-- จบ --------------------------------->

                                        while($row=mysqli_fetch_assoc($query2))
                                        { 
                                        ?>
                                    <tbody>
                                         <tr>
                                                <td><?php echo $i?></td>
                                                <td><?php echo $row['mat_name']?></td>
                                                <td><?php echo $row['omd_qty']?></td>
                                                <td><?php echo $row['omd_price']?></td>
                                                <?php 
                                                   $sum = $row['omd_qty'] *$row['omd_price'];
                                                  $total=$total+($row['omd_qty'] * $row['omd_price']); ?>
                                                 <td><?php echo $sum ?></td>

                                            </tr>
                  
                                        </tbody>
                                      <?php  
                                        $i++ ; 
                                        } ?>
                                </table>
                                <table id="cust">
                                            <tr >
                                                <td colspan="10" align="right" width="80%">ราคารวม</td>
                                                <td align="center"><?php echo number_format($total, 2); ?>฿
                                                </td>
                                            </tr>
                                        </table>
                            </section>
                            
                   
                            
                        </div>
                    </div>



                </div>
                <div class="panel-body">
                    <a href="order_m.php"><button class="button button-n1"
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