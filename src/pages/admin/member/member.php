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
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
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
                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลแม่บ้าน</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>ข้อมูลแม่บ้าน</h3>
                    </div>

                    <div class="panel-options">
                        <!-- <a href="form_mem.php"><i class="glyphicon glyphicon-plus"></i></a>
                        
                        <a href="../pdf/member_print.php"><i class="glyphicon glyphicon-print"></i></a> -->
                        <a href="form_mem.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href="../pdf/member_print.php"><button class="button button-n2"
                                style="vertical-align:middle"><span>พิมพ์รายงาน</span> </button></a>
                    </div>
                </div>
                <div class="panel-body">
                      <table id="customers">
                      <thead>
                              <tr>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยุ่</th>
                                <th>Action</th>
                                
                              </tr>
                     </thead>
            <!-- </table>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยุ่</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead> -->
                        <tbody>

                            <?php
                        $sql = "SELECT * FROM member";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                //echo "<td>" . $row["em_id"]. "</td>";
                                    echo "<td>" . $row["mem_name"]. "</td>";
                                    echo "<td>" . $row["mem_lastname"]. "</td>";
                                    echo "<td>" . $row["mem_tel"]. "</td>";
                                    echo "<td>" . $row["mem_address"]. "</td>";
                                    echo "<td>
                                    <a href='update_form.php?txtID=$row[mem_id]'><button class='buttons buttons2'><i class='glyphicon glyphicon-pencil'></i> </button>
                                    <a href='delete.php?txtID=" . $row['mem_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button>";
                                 
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
                <a href="form_mem.php"><button class="button button-n1"
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