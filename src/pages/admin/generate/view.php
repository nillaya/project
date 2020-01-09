<?php
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
<style>
.button {
  background-color: white; /* Green */
  border: none;
  color: white;
  padding: 4px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px 4px;
  cursor: pointer;
}

.but1 {
  background-color: white; 
  color: black; 
  border: 2px solid Orange;
}

.but2 {
  background-color: white; 
  color: black; 
  border: 2px solid MediumSeaGreen;
}


.right {
    position: absolute;
    right: 0px;
    width: 400px;
    padding: 10px;
}
</style>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php
 //$ID = $_REQUEST['txtID'];
// $sql = "SELECT * FROM order_m  ";
// $result = $conn->query($sql);
// $row = mysqli_fetch_array($result);
?>



    <div class="row">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="order_m.php">การผลิต</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดการผลิต</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">

                    <h2 align="center">รายละเอียดการผลิต </h2>


                    <!-- <div class="panel-options">
                      
                        <a href="form.php"><button class="button button-n3" style="vertical-align:middle"><span><i
                                        class="glyphicon glyphicon-plus"></i></span> </button></a>
                        <a href='update_f.php'><button class="button button-n2"
                                style="vertical-align:middle"><span>แก้ไข</span> </button></a>
                    </div> -->
                    <!-- <br>
                    <div class="right">
                    <b>เลขที่ใบสั่งซื้อ : </b>
                    </div>
                    <br> -->
                </div>
                <!---------------------------------------------- sql --------------->
                <?php  
                                       $ID = $_REQUEST['txtID'];
                                       $sql1 = "SELECT * FROM generate 
                                        INNER JOIN product on generate.p_id = product.p_id WHERE generate_id = $ID "; 
                                       $result1 = $conn->query($sql1);
                                       $row1 = mysqli_fetch_assoc($result1); 
                                       ?>
                <!---------------------------------------------- sql ------------------------------->

                <section class="panel"  style="margin-left:40px;margin-right:40px;">
               
                    <table>
                        <tr>
                            <td>
                                <h7><b>รหัสการผลิต: </b><?php echo $row1['generate_id']?></h7>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h7><b>วันที่ผลิต: </b><?php echo $row1['generate_date']?></h7>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h7><b>สินค้าที่ผลิต : </b><?php echo $row1['p_name']?> &nbsp;&nbsp; Size <?php echo $row1['p_size']?></h7>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h7><b>จำนวน : </b><?php echo $row1['generate_qty']?> คู่</h7>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <?php 
                                    if($row1["status"] == 'กำลังผลิต'){  
                               echo  "<h7><b>สถานะ : </b><button class='button but1'>" . $row1['status']. "</button></h7>";
                                 } else { 
                                echo "<h7><b>สถานะ : </b><button class='button but2'>" .$row1['status']. " </button></h7>";
                                  } ?>
                            </td>
                        </tr>
                    </table>
                </section>

               
                <div class="panel-body">
                <table class="table table-hover" align="center">
                        <thead>
                            <tr>
                                <th align="center" >ลำดับ</th>
                                <th>วัตถุดิบ</th>
                                <th scope="col">จำนวน</th>
                               
                               
                        </thead>
                        </tr>

                        <?php
                                        $i = 1;
                                       
                                       //ตารางรายละเอียดสั่งซื้อ  -->
                                        
                                             
                                             $sql2 = "SELECT * FROM generate_detail 
                                                           INNER JOIN material on generate_detail.material_id = material.material_id
                                                            WHERE generate_detail.generate_id = '$ID'";
                                                            $query2 = mysqli_query($conn,$sql2);   
                                                            
                                                      
                                       // <!-- จบ --------------------------------->

                                        while($row=mysqli_fetch_assoc($query2))
                                        { 
                                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['mat_name']?></td>
                                <td><?php echo $row['m_qty']?></td>
                            </tr>

                        </tbody>
                        <?php  
                                        $i++ ; 
                                        } ?>
                                        
                    </table> 
                    <a href="generate.php"><button type="submit" class="btn btn-primary" >กลับ</button></a>
                    <!-- <a href="generate.php"><button class="button button-n1" style="vertical-align:middle"><span>กลับ</span></button></a> -->
                 
                   
                </div>            
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