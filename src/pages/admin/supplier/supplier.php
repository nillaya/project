<?php
$config = include( __DIR__.'../../../../libs/config.php');
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
                        <h3>ข้อมูลซัพพลายเออร์</h3>
                    </div>

                    <div class="panel-options">
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
                                <th>ชื่อ</th>
                                <th>เบอร์โทร</th>
                                <th>ที่อยู่</th>
                                <th width="20%">Action</th>
                             
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        $sql = "SELECT * FROM supplier ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                             
                                    echo "<td>" . $row["sup_name"]. "</td>";
                                    echo "<td>" . $row["sup_tel"]. "</td>";
                                    echo "<td>" . $row["sup_add"]. "</td>";
                                    
                                
                                    echo "<td>
                                    <a href='update_form.php?txtID=$row[sup_id]'><button class='buttons buttons2'><i class='glyphicon glyphicon-pencil'></i> </button>
                                    <a href='delete.php?txtID=" . $row['sup_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>
                                   </td>";
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