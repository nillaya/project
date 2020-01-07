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
    $sql = "SELECT * FROM products INNER JOIN category ON category.c_id = products.c_id ";
    $result2 = $conn->query($sql);
    $row = mysqli_fetch_assoc($result2);
    extract($row);
 


//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
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
                        <form action="update.php" method="POST" enctype="multipart/form-data" name="addprd"
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
                                <div class="col-sm-8">
                                    <?php
                                         $result = $conn->query("SELECT * FROM category");?>
                                    <p> ประเภทสินค้า </p>
                                    <select name="c_id" class="form-control" required >
                                        <option value="<?php echo $row['c_id']?>"> <?php echo $row['c_name'] ?> 
                                        </option>
                                        <?php foreach($result as $results){?>
                                        <option value="<?php echo $results['c_id']?>">
                                            <?php echo $results['c_name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-4">
                                    <p>เลขที่ผลิต</p>
                                    <?php 
                                      $result = $conn->query("SELECT * FROM generate");?>
                                    <input autocomplete="off" type="text" id="generate_id " name="generate_id"
                                        class="form-control" list='list1' required
                                        value="<?php echo $row['generate_id'] ?>" />
                                    <?php $sql = "SELECT * FROM generate INNER JOIN member ON member.mem_id = generate.mem_id"; 
                                       $result = $conn->query($sql);  ?>
                                    <datalist id='list1'>
                                        <?php while($row = mysqli_fetch_array($result)) {?>
                                        <option value="<?php echo $row['generate_id'] ?>">
                                            <?php echo $row["generate_date"] ?>&nbsp;<?php echo $row["mem_name"] ?>&nbsp;<?php echo $row["mem_lastname"] ?>
                                        </option><?php }?>
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <p> ราคา (บาท) </p>
                                        <input type="number" name="p_price" class="form-control" required
                                            placeholder="ราคา" value="<?php echo $row['p_price'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <p> จำนวน (คู่) </p>
                                            <input type="number" name="p_qt" class="form-control" required
                                                placeholder="จำนวน" value="<?php echo $row['p_qt'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-8 info">
                                        <p> ภาพสินค้า </p>
                                        <img src="../../pic/<?php echo $row['p_image']?>" width="100px">
                                        <input type="file" name="p_image" class="form-control"
                                            value="<?php echo $row['p_image'] ?>" />
                                    </div>




                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary" name="save" value="save"> บันทึก
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