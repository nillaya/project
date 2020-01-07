<?php
// $config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../../libs/app.php');
//$db = include(__DIR__ . '../../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
echo "\n";
session_start();
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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ประเภทสินค้า</li>

                </ol>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>สินค้าชำรุด</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="c_form.php"><i class="glyphicon glyphicon-plus"></i></a>
                        <a href="../pdf/product_print.php"><i class="glyphicon glyphicon-print"></i></a> -->
                        <a href="d_form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="../pdf/product_print.php.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>

                    </div>
                </div>
                <?php $i=0;  
                ?>
                <div class="panel-body">
                    <table id="customers" align="center">
                        <thead>
                            <tr>
                                <th width="20%">ลำดับ</th>
                                <th>สินค้า</th>
                                <th>จำนวน ( คู่ )</th>
                                <th width="20%">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                        $sql = "SELECT * FROM damage Inner join product on damage.p_id = product.p_id ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                    echo "<td>" . $r=$i+1 .  "</td>";
                                    echo "<td>" . $row["p_name"]. "</td>";
                                    echo "<td>" . $row["d_qty"]. "</td>";
                                    // echo "<td>
                                    // &nbsp;&nbsp;<a href='update_f.php?txtID=$row[c_id]'>
                                    //     <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                                    // echo "<td>    
                                    //     <a href='delete.php?txtID=" . $row['c_id']. "'
                                    //     onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\">
                                    //     <i class='glyphicon glyphicon-trash'></i> </td>";
                                    // echo "</tr>";
                                    echo "<td>
                                   
                                    <a href='d_delete.php?ID=" . $row['d_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>
                                   </td>";
                                   echo "</tr>";
                                    
                                    $i++;
                            }
                           
                        }
                        $conn->close();
                        ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php  
                     $_SESSION['i']=$i+1;  ?>
                </div>
                <div class="panel-body">
                    <a href="d_form.php"><button class="button button-n1"
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
    <script src="../../../../assets/jquery/jquery.js"></script>
    <script src="../../../../assets/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../../../js/custom.js"></script>
</body>

</html>