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

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php

$ID = $_REQUEST['ID'];
$sql = "SELECT * FROM customer where cus_id = '$ID' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>


    <div class="row">
        <div class="col-md-9">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <a href="send.php"><button class="button button-n1"
                            style="vertical-align:middle"><span>กลับ</span> </button></a>
                </div>


                <div class="panel-title">
                    <h3 align="center">รายละเอียด</h3>
                </div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <table id="customer">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <td bgcolor="#f2f2f2">รหัส</td>
                                            <td><?php echo $row['cus_id'] ?></td>

                                        </tr>
                                        <tr>
                                            <!-- <td rowspan="2">1</td> -->

                                            <td width=25% bgcolor="#f2f2f2">ชื่อ-นามสกุล</td>
                                            <td><?php echo $row['cus_name']?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">username</td>
                                            <td><?php echo $row['username'] ?></td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">E-mail</td>
                                            <td><?php echo $row['email'] ?></td>

                                        </tr>
                                        <tr>
                                            <td bgcolor="#f2f2f2">เบอร์โทร</td>
                                            <td><?php echo $row['cus_tel'] ?></td>

                                        </tr>
                                        <tr>

                                            <td bgcolor="#f2f2f2">ที่อยู่</td>
                                            <td><?php echo $row['cus_address'] ?></td>

                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                                <br><br>

                                <table class="table">
                                    <tr>

                                        <th width="20%" bgcolor="#B0C4DE">รหัสการขาย</th>
                                        <th bgcolor="#B0C4DE">วันที่ขาย</th>
                                        <th bgcolor="#B0C4DE" >จำนวน</th>
                                        <th bgcolor="#B0C4DE" >สถานะ</th>
                                        <th bgcolor="#B0C4DE">Action</th>

                                    </tr>
                                    </thead>



                                    <?php
                                            $sum=0; $total=0;
                                            $sql2 = "SELECT * FROM sale 
                                            INNER JOIN customer on sale.c_id = customer.cus_id
                                            INNER JOIN shipping on sale.sale_id = shipping.sale_id 
                                            WHERE customer.cus_id = $ID ORDER BY sale.sale_id DESC";
                                            $query2 = mysqli_query($conn,$sql2);                               
                                              while($row1=mysqli_fetch_assoc($query2))
                                            { 
                                           ?>
                                       <tbody>
                                        <tr>
                                            <td><?php echo $row1['sale_id']?></td>
                                            <td><?php echo $row1['sale_date']?></td>
                                            <td><?php echo $row1['sale_total'] ?></td>
                                           <!-- <td><span class="label label-success"><i class='glyphicon glyphicon-send'></i>&nbsp;<?php echo $row1['status_shipping'] ?></span> </td> -->
                                            <?php if($row1['status_shipping'] == 'รอดำเนินการ'){  
                                            echo "<td><span class='label label-warning'><i class='glyphicon glyphicon-time'></i>&nbsp;" . $row1['status_shipping'] . "</span> </td>";                                        
                                            echo "<td>
                                            <a href='update_ship.php?sale_id=$row1[sale_id]'><button type='submit' class='buttons buttons1'> อัพเดต</button>
                                            <a href='../sale/view.php?sale_id=$row1[sale_id]'><button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></a></td>";
                                             } else{
                                            echo "<td><span class='label label-success'><i class='glyphicon glyphicon-send'></i>&nbsp;". $row1['status_shipping']. "</span> </td>";
                                             echo "<td><a href='../sale/view.php?sale_id=$row1[sale_id]'><button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></a></td>";
                                             } ?>
                                            


                                        </tr>
                                    </tbody>
                                    <?php  } ?>
                                </table>


                            </section>
                        </div>
                    </div>



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