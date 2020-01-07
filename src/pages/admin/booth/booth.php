<?php
//$config = include( __DIR__.'../../../../libs/config.php');
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
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>การออกบูธ</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="form_cus.php"><i class="glyphicon glyphicon-plus"></i></a> -->

                        <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="#.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>
                    </div>
                </div>

                <div class="panel-body">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>วันที่</th>
                                <th>สถานที่</th>
                                <th width="20%">Action</th>

                            </tr>
                        </thead>
                </div>
                <tbody>
                    <?php $i=0;  ?>
                    <?php
                        $sql = "SELECT * FROM  booth";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                     echo "<td>" . $r=$i+1 . "</td>";
                                    echo "<td>" . $row["booth_date"]. "</td>";
                                    echo "<td>" . $row["booth_location"]. "</td>";
                                   
                                    echo "<td>
                                   
                                    <a href='delete.php?ID=" . $row['booth_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>
                                    <a href='view.php?ID=$row[booth_id]'> <button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></td>";
                                    echo "</tr>";
                                    
                                    $i++;
                            }
                        }
                        $conn->close();
                        ?>
                    </tr>
                </tbody>
                <?php     $numrow = mysqli_num_rows($result);
                          echo '<p align="right" ><font size="2">จำนวนทั้งหมด'.$numrow.'แถว' .'</font></p>'; ?>
                </table>
                <?php  $_SESSION['i']=$i+1;  ?>

            </div>

            <div class="panel-body">
                <!-- <a href="form_cus.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
                        เพิ่มข้อมูล</button></a> -->
                <a href="form.php"><button class="button button-n1"
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