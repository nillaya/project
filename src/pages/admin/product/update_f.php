<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../libs/app.php');
//$db = include(__DIR__ . '../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
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
    <!-- <link rel="stylesheet" href="../../../../css/dev.css" > -->
</head>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php
    $ID = $_REQUEST['txtID'];
    $sql = "SELECT * FROM product where p_id = '$ID' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
     ?>

    <div class="row">
        <div class="col-md-9">
            <div class="content-box-large">
                <div class="panel-body">
                    <!-- 
    <div class="container">
  <div class="row"> -->
                    <div class="col-md-3"></div>
                    <div class="col-md-6"> <br />
                        <div class="panel-title" align="center">
                            <h3>เพิ่มสินค้า</h3>
                        </div>

                        <hr />
                        <form action="update.php?txtID=<?php echo $ID; ?>" method="POST" name="addprd"
                            class="form-horizontal" id="addprd">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> ชื่อสินค้า</p>
                                    <input type="text" name="p_name" class="form-control" required
                                        placeholder="ชื่อสินค้า" value="<?php echo $row['p_name'] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> รายละเอียดสินค้า </p>
                                    <textarea name="p_detail" class="form-control" rows="3" required
                                        placeholder="รายละเอียดสินค้า"><?php echo $row['p_detail']?> </textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <p> ราคา (บาท) </p>
                                    <input type="number" name="p_price" class="form-control" required placeholder="ราคา"
                                        value="<?php echo $row['p_price'] ?>" />
                                </div>

                                <div class="col-sm-3">
                                    <p> Size </p>
                                    <input type="text" name="p_size" class="form-control" required placeholder="Size"
                                        value="<?php echo $row['p_size'] ?>" />
                                </div>

                                <div class="col-sm-4">
                                    <p> จำนวน(คู่) </p>
                                    <input type="number" name="p_qt" class="form-control" required placeholder="จำนวน"
                                        value="<?php echo $row['p_qt'] ?>" />
                                </div>
                            </div>

                        


                                <div class="form-group">
                                    <div class="col-sm-8 info">
                                        <p> ภาพสินค้า </p>
                                        <?php  $sql2 = "SELECT * FROM product"; 
                                         $result1 = $conn->query($sql2);
                                          $row2 = mysqli_fetch_assoc($result1);?>
                                        <img src="../../pic/<?php echo $row['p_image'] ?>" width="150px">
                                        <br>
                                        <input type="file" name="p_image" class="form-control">
                                             
                                    </div>
                                </div>




                                <div class="form-group">
                                <div class="col-sm-8">
                                <p>แบรนด์สินค้า</p>
                                    <select type="text" class="form-control" id="partner_id" name="partner_id" list="list2"
                                        placeholder="">
                                        <option> เลือก </option>
                                        <?php
                                         $sql2 = " SELECT * FROM partner ";
                                         $result2 = $conn->query($sql2);
                                        while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row2["partner_id"]; ?>">
                                            <?=$row2["partner_id"]; ?> | <?=$row2["p_brand"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>


                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary" name="update" > บันทึก
                                        </button>
                                        <button type="submit" class="btn btn-danger" formaction="product.php"> ยกเลิก
                                        </button>
                                    </div>
                                </div>
                        </form>
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