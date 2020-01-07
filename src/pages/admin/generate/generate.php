<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../../libs/app.php');
//$db = include(__DIR__ . '../../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
echo "\n";
?>

<!DOCTYPE html>
<html>
    <style>
    
    
    
    </style>

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
                        <h3>การผลิต</h3>
                    </div>

                    <div class="panel-options">
                    <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="#.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>

                    </div>
                </div>



              
                <div class="panel-body">
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>วันที่ผลิต</th>
                                <th>จำนวน</th>
                                <th>แม่บ้านที่ผลิต</th>
                                <th>สถานะ</th>
                                <th width="20%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        $sql = "SELECT * FROM generate INNER JOIN member on member.mem_id=generate.mem_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                //echo "<td>" . $row["em_id"]. "</td>";
                                    echo "<td>" . $row["generate_date"]. "</td>";
                                    echo "<td>" . $row["generate_qty"]. "</td>";
                                    echo "<td>" . $row["mem_name"]. '&nbsp;&nbsp;&nbsp;'.  $row["mem_lastname"]. "</td>";
                                    $st = 'เสร็จสิ้น';
                                    if ($st == $row["status"]){
                                    echo "<td> <button class='btn btn-success btn-sm'><i class='glyphicon glyphicon-ok-sign'></i><h7> " . $row["status"]."</h7></button> </td>";
                                    } else{
                                    echo "<td> <a href='status.php?txtID=$row[generate_id]'><span class='btn btn-warning btn-sm' ><i class='glyphicon glyphicon-refresh'></i>" . $row["status"]."</span></td>";
                                    }
                                    //echo "<td><a href='status.php?txtID=$row[generate_id]'><button class='buttons buttons5' >" . $row["status"]." </button></td>";
                                    echo "<td>
                                    <a href='form_update.php?txtID=$row[generate_id]'><button class='buttons buttons2'><i class='glyphicon glyphicon-pencil'></i> </button>
                                    <a href='delete.php?txtID=" . $row['generate_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>
                                    <a href='view.php?txtID=$row[generate_id]'><button class='buttons buttons4'><i class='glyphicon glyphicon-eye-open'></i></button></td>";
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
                    
                <a href="form.php"><button class="button button-n1"
               
                        style="vertical-align:middle"><span>เพิ่มข้อมูล</span> </button></a>
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