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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">การจัดส่งสินค้า</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>การจัดส่งสินค้า</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="form_cus.php"><i class="glyphicon glyphicon-plus"></i></a> -->

                        <a href="form_cus.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="#.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>
                    </div>
                </div>

                <div class="panel-body">
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>รหัสการขาย</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <!-- <th>สถานะ</th> -->
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                </div>
                <tbody>

                    <?php
                        $sql = "SELECT * FROM customer
                        INNER JOIN sale on customer.cus_id = sale.c_id 
                        INNER JOIN shipping on sale.sale_id = shipping.sale_id WHERE customer.cus_id = sale.c_id AND shipping.status_shipping = 'รอดำเนินการ'  order BY sale.sale_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                    echo "<td>" . $row["sale_id"]. "</td>";
                                    echo "<td>" . $row["cus_name"]. "</td>";
                                    echo "<td>" . $row["cus_tel"]. "</td>";
                                    // echo "<td>" . $row["status_shipping"]. "</td>";

                                    echo "<td>
                                    <a href='view.php?ID=$row[cus_id]'><button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button>
                                    <a href='delete_cus.php?ID=" . $row['cus_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button></td>";
                                    echo "</tr>";
                            }
                        }
                        $conn->close();
                        ?>
                    </tr>
                </tbody>
                </table>

            </div>

            <div class="panel-body">
                <!-- <a href="form_cus.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
                        เพิ่มข้อมูล</button></a> -->
                <a href="form_cus.php"><button class="button button-n1"
                        style="vertical-align:middle"><span>เพิ่มข้อมูล</span> </button></a>
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