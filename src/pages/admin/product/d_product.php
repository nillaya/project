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

            <ol class="breadcrumb">
                <!-- <h3>ข้อมูลสินค้า</h3>
        </ol>  -->
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../main/index.php">Home</a></li>
                    <li><i class="icon_documents_alt"><a href="product.php"></i>สินค้า</a></li>
                    <!-- <li><i class="fa fa-square-o"></i>สินค้าชำรุด</li> -->
                </ol>
        </div>

        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->

                <div class="panel-heading">
                    <div class="panel-title">

                        <h3>รายละเอียดสินค้า</h3>
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
                <?php 
                 $strCustomerID = null;

                if(isset($_POST["txtID"]))
                {
	           $strCustomerID = $_POST["txtID"];
                }
  
                //  $serverName = "localhost";
                //  $userName = "root";
                //  $userPassword = "root";
                //  $dbName = "mydatabase";

                //    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	           $sql ="SELECT * FROM product_detail INNER JOIN product on product.p_id=product_detail.p_id INNER JOIN partners on partners.partner_id=product_detail.partner_id";

             $query = mysqli_query($conn,$sql);
	        $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
               ?>
                <table width="284" border="1">
                    <tr>
                        <th width="120">ProductID</th>
                        <td width="238"><?php echo $result["p_id"];?></td>
                    </tr>
                    <tr>
                        <th width="120">Name</th>
                        <td><?php echo $result["p_name"];?></td>
                    </tr>
                    <tr>
                        <th width="120">partner</th>
                        <td><?php echo $result["partner_name"];?></td>
                    </tr>
                    <tr>
                        <th width="120">price</th>
                        <td><?php echo $result["p_price"];?></td>
                    </tr>
                    <tr>
                        <th width="120">quantity</th>
                        <td><?php echo $result["p_qty"];?></td>
                    </tr>
                    <tr>
                        <th width="120">detail</th>
                        <td><?php echo $result["p_detail"];?></td>
                    </tr>
                </table>
                <?php
mysqli_close($conn);
?>

            </div>
            <div class="panel-body">
                <!-- <a href="form.php"><button class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i>
                            เพิ่มข้อมูล</button></a> -->
                <a href="product.php"><button class="button button-n1"
                        style="vertical-align:middle"><span>ตกลง</span> </button></a>



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