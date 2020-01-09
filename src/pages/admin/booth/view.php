<?php
include('../../../libs/db.php');
echo "\n";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
</head>
<style>
/* .less table {
    border-top-style: none;
    border-left-style: none;
    border-right-style: none;
    border-bottom-style: none;

} */
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
                    <li class="breadcrumb-item"><a href="order_m.php">จัดการออกบูธ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดการออกบูธ</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">

                    <h2 align="center">รายละเอียดการออกบูธ </h2>


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
                                       $ID = $_REQUEST['ID'];
                                       $sql = "SELECT * FROM booth  where booth_id = $ID "; 
                                       $result = $conn->query($sql);
                                       $row = mysqli_fetch_assoc($result); 
                                       ?>
                <!---------------------------------------------- sql -->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">



                            <table width="80%" cellspacing="1" bgcolor="#CCCCCC">
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">รหัสการออกบูธ :</td>
                                        <td><?php echo $row['booth_id']?></td>
                                    </tr>
                                    <tr>
                                        <td>วันที่</td>
                                        <td><?php echo $row['booth_date']?></td>
                                    <tr>
                                        <td>สถานที่จัดบูธ:</td>
                                        <td><?php echo $row['booth_location']?></td>

                                    </tr>
                                </tbody>
                            </table>

                            <br><br>

                            <table class="table">
                                <tr>
                                 
                                        <th width="20%" bgcolor="#EEE5DE" >รหัสสินค้า</th>
                                        <th bgcolor="#EEE5DE">สินค้า</th>
                                        <th bgcolor="#EEE5DE">จำนวน</th>
                                    </tr>
                                </thead>
                        

                            <!-- <section class="panel">
                                <table>
                                    <thead>
                                        <tr>

                                            <th width="20%">รหัสสินค้า</th>
                                            <th>สินค้า</th>
                                            <th>จำนวน</th>
                                        </tr>
                                    </thead> -->


                                    <!-- //ตารางลายละเอียด -->
                                    <?php
                                 $sql2 = "SELECT * FROM boot_d 
                                         INNER JOIN product on boot_d.p_id = product.p_id
                                         INNER JOIN booth on boot_d.booth_id = booth.booth_id 
                                         WHERE boot_d.booth_id = '$ID'";
                                         $query2 = mysqli_query($conn,$sql2);   
                                                                 
                                  
                                while($row1=mysqli_fetch_assoc($query2))
                                        { 
                                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row1['p_id']?></td>
                                            <td><?php echo $row1['p_name']?></td>
                                            <td><?php echo $row1['p_qty']?></td>
                                        </tr>
                                    </tbody>
                                    <?php  } ?>
                                </table>
                            </section>








                        </div>
                    </div>



                </div>
                <div class="panel-body">
                    <a href="booth.php"><button class="button button-n1"
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