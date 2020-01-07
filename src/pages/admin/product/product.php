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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.20/datatables.min.css"/>
 
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
                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลสินค้า</li>

                </ol>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->

                <div class="panel-heading">
                    <div class="panel-title">

                        <h3>ข้อมูลสินค้า</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="form.php"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="../pdf/product_print.php"><i class="glyphicon glyphicon-print"></i></a> -->
                        <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="form.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>
                        <!-- <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a> -->

                    </div>
                </div>
                <?php $i = 0; ?>
                <div class="panel-body">
                    <!-- <table id="customers"> -->
                        <table class="table table-responsive" id="mytable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคาสินค้า</th>
                                <th>size</th>
                                <th>จำนวน</th>
                                <th>ประเภท</th>
                                <th>รูปภาพ</th>
                                <th>ดำเนินการ</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php

                        $sql = "SELECT * FROM product INNER JOIN partner on partner.partner_id=product.partner_id ";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0 ) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                    // echo "<td>" . $r=$i+1 .  "</td>";
                                    echo "<td>" . $row["p_id"]. "</td>";
                                    echo "<td>" . $row["p_name"]. "</td>";
                                    echo "<td>" . $row["p_price"]. "</td>";
                                    echo "<td>" . $row["p_size"]. "</td>";
                                    echo "<td>" . $row["p_qt"]. "</td>";
                                    echo "<td>" . $row["p_brand"]. "</td>";
                                    echo '<td><img src="../../pic/' . $row["p_image"].'"style="width:50px;height:50px;"/></td>';
                                    // echo "<td>" . $row["p_detail"]. "</td>";
                                   
                                    // echo "<td>" . $row["generate_date"]. "</td>";
                                    echo "<td>
                                     <a href='update_f.php?txtID=$row[p_id]'><button class='buttons buttons2'><i class='glyphicon glyphicon-pencil'></i> </button>
                                     <a href='delete.php?txtID=" . $row['p_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>
                                     <a href='view.php?txtID=$row[p_id]'<button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></td>";
                                    echo "</tr>";
                            //    $i++;
                                }    
                        }
                        $conn->close();
                        
                        ?>
                            </tr>
                        </tbody>
                        <?php
                        // $numrow = mysqli_num_rows($result);
                        //         echo '<p align="right" ><font size="2">จำนวนทั้งหมด'.$numrow.'แถว' .'</font></p>'; ?>
                    </table>

                </div>
                <div class="panel-body">
                    <!-- <a href="form.php"><button class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i>
                            เพิ่มข้อมูล</button></a> -->
                    <a href="form.php"><button class="button button-n1"
                            style="vertical-align:middle"><span>เพิ่มข้อมูล</span> </button></a>



                </div>
            </div>

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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
  
    <!-- <script src="../../../../assets/jquery/jquery.js"></script> -->
    <script src="../../../../assets/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../../../js/custom.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>