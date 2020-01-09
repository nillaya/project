<?php
include('../../../libs/db.php');
echo "\n";
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


                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>ข้อมูลการขายสินค้า</h3>
                    </div>

                    <div class="panel-options">
                        <a href="form.php"><i class="glyphicon glyphicon-plus"></i></a>

                    </div>
                </div>

                <div class="panel-body">
                <table id="customers">
                        <thead>
                            <tr>
                                <th width="20%">วันที่</th>
                                <th>ลูกค้า</th>
                                <th>ราคารวม</th>
                                <th>สถานะ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        $sql = "SELECT * FROM sale 
                        INNER JOIN customer on sale.c_id= customer.cus_id
                        INNER JOIN payment on sale.sale_id = payment.sale_id ORDER BY sale.sale_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                //echo "<td>" . $row["em_id"]. "</td>";
                                    echo "<td>" . $row["sale_date"]. "</td>";
                                    echo "<td>" . $row["cus_name"]. "</td>";
                                    echo "<td>" . $row["sale_total"]. "</td>";
                                    if($row["status_pay"] == 'ยืนยันการชำระเงิน'){
                                        echo "<td><button class='btn btn-success btn-sm'><i class='glyphicon glyphicon-ok-sign'></i><h7> " . $row["status_pay"]."</h7></button> </td>";
                                    }else{
                                        echo "<td> <a href='view_pay.php?txtID=$row[sale_id]'><span class='btn btn-warning btn-sm' ><i class='glyphicon glyphicon-search'></i>" . $row["status_pay"]."</span></td>";
                                    }
                                    echo "<td>
                                   
                                    <a href='view.php?sale_id=$row[sale_id]'><button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></a>
                                    <a href='delete.php?txtID=" . $row['sale_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button></td>";
                                 
                                    echo "</tr>";
                            }
                        }
                        $conn->close();
                        ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- <div class="panel-body">
                    <a href="form.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
                            เพิ่มข้อมูล</button></a>
                    </div> -->
                

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