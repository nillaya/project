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
<script src="../../../libs/jquery-3.4.1.min.js"></script>

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
                    <li class="breadcrumb-item"><a href="salary.php">ค่าตอบแทน</a></li>
                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูล</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <div class="panel-body">
                    <!-- 
    <div class="container">
  <div class="row"> -->
                    <div class="col-md-3"></div>
                    <div class="col-md-6"> <br />
                        <div class="panel-title" align="center">
                            <h3>ค่าตอบแทน</h3>
                        </div>


                        <hr />
                        <form action="insert.php" method="POST" name="addprd" class="form-horizontal" id="addprd">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> วันที่จ่าย </p>
                                    <input type="date" name="salary_date" class="form-control" rows="3" required
                                        placeholder="วันที่จ่าย">
                                </div>
                            </div>



                            <p> แม่บ้าน </p>
                            <?php 
                              $result= $conn->query("SELECT * FROM member");?>
                            <input autocomplete="off" type="text" id="mem_id " name="mem_id"
                                class="form-control" list='list2' required placeholder="แม่บ้าน">
                            <?php $sql= "SELECT * FROM member "; 
                             $result= $conn->query($sql);  ?>
                            <datalist id='list2'>
                                <?php while($row = mysqli_fetch_array($result)) {?>
                                <option
                                    value="<?php echo $row["mem_id"]?> | <?php echo  $row["mem_name"]. '&nbsp;&nbsp;'. $row["mem_lastname"]?>">
                                </option><?php }?>
                            </datalist>
                            <br>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <p> จำนวนผลิต</p>
                                    <input type="number" name="generate_qty" class="form-control" id="amount"
                                        placeholder="จำนวนเงินผลิต" />
                                </div>
                             
                                <div class="col-sm-4">
                                    <p> ราคา/หน่วย</p>
                                    <input type="number" name="price" class="form-control" id="price" placeholder="ราคา"
                                        value="130" />
                                </div>
                                
                                <div class="col-sm-4">
                                    <p> จำนวนเงิน</p>
                                    <input type="number" name="salary_amount" class="form-control" id="total"
                                        placeholder="จำนวนเงิน" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> สถานะ </p>
                                    <input autocomplete="off" type="text" id="status " name="status"
                                        class="form-control" list='list' required placeholder="สถานะ">
                                    <datalist id='list'>
                                        <option value="จ่ายแล้ว">จ่ายแล้ว</option>
                                        <option value="ยังไม่จ่าย">ยังไม่จ่าย</option>
                                    </datalist>

                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" name="save" value="save"> บันทึก
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
<script type="text/javascript">
$(document).ready(function() {
    // console.log("gg3");

    $("#amount").keyup(function() {
        var total = $("#amount").val() * $("#price").val();
        $("#total").val(total);
        console.log("gg:" + total);
    });

    $("#price").keyup(function() {
        var total = ($("#amount").val() * $("#price").val());
        $("#total").val(total);
    });
});
</script>