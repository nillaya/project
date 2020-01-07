<?php
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
                        <form action="save.php" method="POST" enctype="multipart/form-data" name="addprd"
                            class="form-horizontal" id="addprd">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> ชื่อสินค้า</p>
                                    <input type="text" name="p_name" class="form-control" required
                                        placeholder="ชื่อสินค้า" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> รายละเอียดสินค้า </p>
                                    <textarea name="p_detail" class="form-control" rows="3" required
                                        placeholder="รายละเอียดสินค้า"></textarea>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="col-sm-8">
                                <p>Brand </p>
                                    <select type="text" class="form-control" id="p_brand " name="partner_id" list="list1"
                                        placeholder="">
                                        <option> เลือก </option>
                                        <?php
                                         $sql2 = " SELECT * FROM partner ";
                                         $result2 = $conn->query($sql2);
                                        while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row2["partner_id"].$row2["p_brand"]; ?>">
                                        <?php if($row2["partner_id"] != 3) {
                                           echo " Tlejourn X ".$row2['p_brand'] ;
                                        } else {  
                                           echo  $row2['p_brand']; 

                                           }
                                        ?>
                                            
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <p>Size</p>
                                    <input type="text" name="p_size" class="form-control" required placeholder="ขนาด" />
                                </div>

                                <div class="col-sm-4">
                                    <p> ราคา (บาท) </p>
                                    <input type="number" name="p_price" class="form-control" required
                                        placeholder="ราคา" />
                                </div>
                                <div class="col-sm-3">
                                    <p> จำนวน (คู่) </p>
                                    <input type="number" name="p_qt" class="form-control" required
                                        placeholder="จำนวน" />
                                </div>

                                <div class="col-sm-8 info">
                                    <br>
                                    <p> ภาพสินค้า </p>
                                    <input type="file" name="p_image" class="form-control" />
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <br><button type="submit" class="btn btn-primary" name="save" value="save"> +
                                        เพิ่มสินค้า </button>
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