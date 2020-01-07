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



    <div class="row">
        <div class="col-md-9">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ค่าตอบแทน</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>ค่าตอบแทน </h3>
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
                                <th>รหัส</th>
                                <th>ชื่อ-สกุล</th>
                                <th>จำนวนผลิต</th>
                                <th>จำนวนเงิน</th>
                                <th>สถานะ</th>
                                
                                <th>Action</th>
                                
                              </tr>
                     </thead>
            
                        <tbody>

                            <?php
                        $total=0;
                        
                        // $sql = "SELECT  generate.generate_id, generate.generate_qty,member.mem_name, salary.status_salary FROM generate
                        //  INNER JOIN member on  generate.mem_id = member.mem_id
                        //  INNER JOIN salary on generate.generate_id = salary.generate_id;
                        //  ";
                        $sql = "SELECT * FROM generate INNER JOIN member on  generate.mem_id = member.mem_id ORDER BY generate.generate_id DESC  ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>";
                                    echo "<td>" . $row["mem_id"]. "</td>";
                                    echo "<td>" . $row["mem_name"] . "&nbsp;&nbsp;   "  . $row["mem_lastname"]. "</td>";
                                    echo "<td>" . $row["generate_qty"]. "&nbsp;&nbsp;  คู่</td>";
                                     $total=($row["generate_qty"]*130);
                                     echo "<td>" . $total. "&nbsp;&nbsp; บาท</td>";

                                    if($row['sta'] == '2' ){
                                        echo "<td><span class='label label-success'>จ่ายเงินแล้ว</span></td>"; 
                                        echo "<td> <a href='view.php?ID=$row[generate_id]'><button class='buttons buttons2'><i class='glyphicon glyphicon-eye-open'></i> </button><a/>
                                              <a href='delete.php?txtID=" . $row['generate_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button></td>"; 
                                    }else{
                                    echo "<td><a href='update_salary.php?ID=$row[generate_id]'><button class='buttons buttons2'>อัพเดต</button></a></td>";
                                    echo "<td>
                                    <a href='delete.php?txtID=" . $row['generate_id']. "' onclick=\"return confirm('ต้องการจะลบข้อมูลนี้ใช่หรือไม่?')\"><button class='buttons buttons3'><i class='glyphicon glyphicon-trash'></i> </button></td>";}
                                 
                                    echo "</tr>";
                            }
                        }
                        $total=0;
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