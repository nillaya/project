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

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../css/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
    <link href="../../../../bootstrap/css/bootin.css" rel="stylesheet">
    <link href="../../../../css/calendar.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>


    <div class="row">
        <div class="col-md-9">



        </div>

        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <a href="../send/send.php" class="thumbnail">
                            <img src="../../pic/i11.jpg" alt="..." width="70%">
                        </a>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <a href="../sale/sale.php" class="thumbnail">
                            <img src="../../pic/i2.png" alt="..." width="70%">
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="../customer/customer.php" class="thumbnail">
                            <img src="../../pic/i3.png" alt="..." width="70%">
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="../salary/salary.php" class="thumbnail">
                            <img src="../../pic/i4.jpg" alt="..." width="70%">
                        </a>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content-box-large">

            <div class="w3-container">
                <div align="center"> 
                <h2></h2>
                <br><br><br>

  <div class="w3-card-4" style="width:50%" >
    <img src="../../pic/im8.jpg" alt="Alps" style="width:100%">
    <div class="w3-container w3-center">
      <p>Tlejourn / KHAYA</p>
    </div>
  </div>
</div>
</div>
                <div class="panel-heading">
                    <div class="panel-title">

                    </div>

                </div>







        </div>
        </div>






                            
                <!-- <div class="w3-container">
                <div align="center"> 
                <h2>Photo Card</h2>

  <div class="w3-card-4" style="width:50%" >
    <img src="../../pic/im8.jpg" alt="Alps" style="width:100%">
    <div class="w3-container w3-center">
      <p>Tlejourn / KHAYA</p>
    </div>
  </div>
</div>
</div>
                <div class="panel-heading">
                    <div class="panel-title">

                    </div>

                </div> -->


            <div class="panel-body">







            </div>

        </div>

    </div>
    </div>

















    <div class="col-md-10">
        <div class="panel-body">
            <!-- <div class="row">
                <?php
                                    $sql = "SELECT * FROM product";
                                    $result = $conn->query($sql);
                                      if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                 ?>
                <div class="col-lg-3 col-md-6 col-sm-6 panel-success">
                    <div class="content-box-header panel-heading">
                        <div class="panel-title "><?php echo $row["p_name"] ?></div>

                    </div>
                    <div class="content-box-large box-with-header">
                        <p class="card-title"><?php echo $row["p_qt"] ?></p>
                    </div>
                </div>

                <?php
                        }
                    } else{
                        echo "0 results";
                    }

                    ?>

 </div> -->
            <!-- <?php 
 $sql="SELECT * FROM product ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_num_rows($result);
?>
 <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 panel-success">
                    <div class="content-box-header panel-heading">
                        
                       <div align="center"><i class="glyphicon glyphicon-shopping-cart"></i> สินค้าทั้งหมด
                        </div>

                    </div>
                    <div class="content-box-large box-with-header">
                    <div align="center">สินค้าทั้งหมด <?php echo $row; ?>แบบ </p>
                    </div>
                </div>

                           
                   
            </div> -->














            <div class="row">
                <div class="col-md-2">



                </div>
            </div>
        </div>

        <!-- <div class="panel-body">
            <div class="content-box-large">


                <footer>
                    <div class="container">

                        <div class="copy text-center">
                            Copyright 2014 <a href='#'>Website</a>
                        </div>

                    </div>
                </footer>
            </div> -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../../../../assets/jquery/jquery.js"></script>
        <script src="../../../../assets/popper.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
        <script src="../../../../js/custom.js"></script>
        <script src="../../../../css/fullcalendar/fullcalendar.js"></script>
        <script src="../../../../css/fullcalendar/gcal.js"></script>
        <script src="../../../../js/calendar.js"></script>
</body>

</html>